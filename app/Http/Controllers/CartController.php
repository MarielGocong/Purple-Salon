<?php

namespace App\Http\Controllers;

use App\Jobs\SendAppointmentConfirmationMailJob;
use App\Notifications\NewAppointmentNotification;
use App\Models\Role;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    public function index()
    {
        // Get the cart of the user that is not paid
        $cart = auth()->user()->cart()->where('is_paid', false)->first();
        return view('web.cart', compact('cart'));
    }

    public function removeItem($cart_service_id)
    {
        // Get the cart of the user that is not paid
        $cart = auth()->user()->cart()->where('is_paid', false)->first();

        // If the cart is not found, redirect back
        if (!$cart) {
            return redirect()->back();
        }

        // Get the cart_service with id = cart_service_id
        $cart_service = DB::table('cart_service')->where('id', $cart_service_id)->where('cart_id', $cart->id)->first();

        // If the cart service is not found, redirect back
        if (!$cart_service) {
            return redirect()->back();
        }

        // Delete the cart service
        DB::table('cart_service')->where('id', $cart_service_id)->where('cart_id', $cart->id)->delete();

        // Update the total
        $cart->total = $cart->services()->sum('cart_service.price');
        $cart->save();

        return redirect()->back();
    }

    public function checkout()
    {
        // Retrieve the unpaid cart for the authenticated user
        $cart = auth()->user()->cart()->where('is_paid', false)->with('services')->first();

        // Redirect back if no unpaid cart is found
        if (!$cart || $cart->services->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty. Please add services to proceed.');
        }

        // Track employee availability and unavailable employees
        $is_all_employees_available = true;
        $unavailable_employees = collect();

        // Check availability for each service in the cart
        foreach ($cart->services as $service) {
            $is_available = DB::table('appointments')
                ->where('date', $service->pivot->date)
                ->where('time', $service->pivot->time)
                ->where('employee_id', $service->pivot->employee_id)
                ->doesntExist();

            if (!$is_available) {
                $is_all_employees_available = false;

                // Add unavailable employee information
                $employee_name = DB::table('employees')
                    ->where('id', $service->pivot->employee_id)
                    ->value('first_name');

                $unavailable_employees->push([
                    'service_name' => $service->name,
                    'date' => $service->pivot->date,
                    'time' => $service->pivot->time,
                    'first_name' => $employee_name,
                ]);
            }
        }

        // Handle unavailable employees
        if (!$is_all_employees_available) {
            return redirect()->back()->with('unavailable_employees', $unavailable_employees);
        }

        // Create appointments for available services
        $appointments = [];
        foreach ($cart->services as $service) {
            $appointment = Appointment::create([
                'cart_id' => $cart->id,
                'user_id' => $cart->user_id,
                'service_id' => $service->id,
                'time' => $service->pivot->time,
                'date' => $service->pivot->date,
                'first_name' => $service->pivot->first_name,
                'employee_id' => $service->pivot->employee_id,
                'total' => $service->pivot->price,
            ]);
            $appointments[] = $appointment;
        }

        // Mark the cart as paid
        $cart->update(['is_paid' => true]);

        // Send confirmation emails to the customer
        $customer = auth()->user();
        foreach ($appointments as $appointment) {
            SendAppointmentConfirmationMailJob::dispatch($customer, $appointment);
        }

        // Notify admins and employees
        $admins = User::whereHas('role', function ($query) {
            $query->whereIn('name', ['Admin', 'Employee']);
        })->get();

        foreach ($admins as $admin) {
            $admin->notify(new NewAppointmentNotification(end($appointments))); // Notify with the last appointment
        }

        return redirect()->route('customerview')->with('message', 'Your appointment has been booked successfully.');
    }

}
