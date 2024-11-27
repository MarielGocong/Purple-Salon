<x-app-layout>
  <x-slot name="mainLogoRoute">
    {{ route('home') }}
  </x-slot>


    <div class="relative">
        {{-- <img class="w-full" src="{{ asset('images\banner-salon.png') }}" alt="Banner image"> --}}
        {{-- <img class="max-h-fit w-full" src="{{ asset('images\salon1.png') }}" alt="Banner image"> --}}
        <!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

<section
class="relative bg-cover bg-center bg-no-repeat " style="background-image: url({{ asset('images/background.jpg') }}" ;>
<div class="absolute inset-0 bg-gradient-to-r from-white/90 to-white/0 ltr:bg-gradient-to-r rtl:bg-gradient-to-l sm:bg-transparent sm:from-white/95 sm:to-white/0"></div>

<div
  class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8"
>
  <div class="max-w-xl text-left ltr:sm:text-left rtl:sm:text-right">
    <h1 class="text-3xl font-extrabold sm:text-5xl text-neutral-700">
      Find Your Perfect Salon Experience at
      <strong class="block font-extrabold text-salonPurple">
        Purple Look Hair Salon and Spa.      </strong>
    </h1>

    <p class="mt-4 max-w-lg sm:text-xl/relaxed">
        Purple Look's full-service Salon is prepared in every way to make you look amazingly beautiful.
         </p>

    <div class="mt-8 flex flex-wrap gap-4 text-center">
      <a href="{{route('services')}}" class="block w-full rounded bg-salonPurple px-12 py-3 text-lg font-medium text-white shadow hover:bg-secondary focus:outline-none focus:ring active:bg-purple-500 sm:w-auto">Book Now      </a>

      <a href="{{route('services')}}" class="block w-full rounded bg-white px-12 py-3 text-lg font-medium text-salonPurple shadow hover:text-secondary focus:outline-none focus:ring-offset-purple-400 active:text-purple-500 sm:w-auto">Browse Services</a>


    </div>

  </div>
</div>
</section>

        {{-- <img class="w-full bg-cover" src="{{ asset('images\Salon2.jpg') }}" alt="Banner image"> --}}
        {{-- <div class="absolute right-1 top-5 font-black text-purple-600 text-7xl">30% OFF <br>THIS SEASON</div> --}}
 <div>
    <div class="text-center text-4xl font-semibold text-salonPurple m-2 mt-5">Categories</div>

    <div class="container flex gap-10 p-10 pt-3 justify-center mx-auto">
      <a href="#" class="text-center gap-2 duration-300 hover:scale-105">
          <img class="w-60 rounded-xl" src="{{ asset('images/hair.jpg')}}" alt="">
          <span class="text-salonPurple text-2xl">Hair</span>
      </a>
      <a href="#" class="text-center gap-2 duration-300 hover:scale-105">
        <img class="w-60 rounded-xl" src="{{ asset('images/nails.jpg')}}"  alt="">
        <span class="text-salonPurple text-2xl">Nails</span>

      </a>
      <a href="#" class="text-center gap-2 duration-300 hover:scale-105">
        <img class="w-60 rounded-xl" src="{{ asset('images/skin.jpg')}}" alt="">
        <span class="text-salonPurple text-2xl">Spa</span>

      </a>
      <a href="#" class="text-center gap-2 duration-300 hover:scale-105">
        <img class="w-60 rounded-xl" src="{{ asset('images/makeup.jpg')}}" alt="">
        <span class="text-salonPurple text-2xl">Makeup</span>
      </a>
    </div>

    </div>

    <section class="pt-5 bg-white">
      <div class="md:w-4/5 mx-auto">
        <div class="mx-auto text-center md:max-w-xl lg:max-w-3xl">
          <h3 class="mb-6 text-3xl text-salonPurple font-bold">Popular Services</h3>
          <p class="mb-6 pb-2 text-gray-700 md:mb-12 md:pb-0">
            Services Popular among our customers.
          </p>
        </div>

        <div class="flex flex-col md:flex-row mt-3 pb-7 h-max">
            @if($popularServices->count() > 0)
                @foreach ($popularServices as $service)
                    <x-service-card :service="$service"/>
                @endforeach
            @else
                <p class="mx-auto text-center block text-gray-700 md:mb-12 md:pb-0">
                    No Services Found
                </p>
            @endif
        </div>
      </div>

      <div class="flex justify-end mx-auto pb-5 gap-3 md:w-3/4">

        <a href="{{route('services')}}" class="bg-salonPurple hover:bg-secondary text-white font-bold py-2 px-4 rounded">
          View All Services
        </a>
      </div>


    </section>

    {{--<section class=" w-3/4 p-3 mx-auto pt-5">
    <div>
    <div class="text-center text-4xl font-semibold text-salonPurple m-2">Offers</div>
    </div>
    <div class="flex gap-10 ">
        @if($deals->count() > 0)
            @foreach($deals as $deal)
                @if($deal->is_hidden == false)
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $deal->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 ">{{ $deal->description }}</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-500 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 ">
                            View Offer
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                @endif
            @endforeach
        @else
            <p class="mx-auto text-center block text-gray-700 md:mb-12 md:pb-0">
                No Deals Found
            </p>
        @endif
    </div>
    </section>

    {{-- Gallery --}}
    <section class="pt-5 pb-5 px-10">
        <div class="mx-auto text-center md:max-w-xl lg:max-w-3xl">
          <h3 class="text-3xl text-salonPurple font-bold pb-5">Gallery</h3>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g1.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g2.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g3.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g4.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g5.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g6.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g7.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g8.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g9.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g10.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g11.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="images/gallery/g12.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="bg-white pt-5">
      <div class="md:w-3/4 mx-auto">
        <div class="mx-auto text-center md:max-w-xl lg:max-w-3xl">
          <h3 class="mb-6 text-3xl text-salonPurple font-bold">Testimonials</h3>
          <p class="mb-6 pb-2 text-gray-700 md:mb-12 md:pb-0">
            Here are the testimonials from our customers who have visited our salon.
          </p>
        </div>

        <div class="grid gap-6 text-center p-6 md:grid-cols-3 lg:gap-12">
          <div class="mb-12 md:mb-0">
            <div class="mb-6 flex justify-center">
              <img src="{{asset('images\test.jpg')}}" class="w-32 rounded-full shadow-lg dark:shadow-black/30">
            </div>
            <h5 class="mb-4 text-xl font-semibold">Kim Wexler</h5>
            <h6 class="mb-4 font-semibold text-primary dark:text-primary-400">
              New Customer
            </h6>
            <p class="mb-4 text-neutral-500">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block h-7 w-7 pr-2" viewBox="0 0 24 24">
                <path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"></path>
              </svg>
              I had the most amazing experience at Purple Look Salon and Spa! The staff were so friendly and welcoming, and my hair looked absolutely stunning. I received so many compliments after my appointment and I can't wait to go back!
            </p>
            <ul class="mb-0 flex items-center justify-center">
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg clip-rule="evenodd" fill-rule="evenodd" fill="currentColor" class="h-5 w-5 text-yellow-500" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="m11.322 2.923c.126-.259.39-.423.678-.423.289 0 .552.164.678.423.974 1.998 2.65 5.44 2.65 5.44s3.811.524 6.022.829c.403.055.65.396.65.747 0 .19-.072.383-.231.536-1.61 1.538-4.382 4.191-4.382 4.191s.677 3.767 1.069 5.952c.083.462-.275.882-.742.882-.122 0-.244-.029-.355-.089-1.968-1.048-5.359-2.851-5.359-2.851s-3.391 1.803-5.359 2.851c-.111.06-.234.089-.356.089-.465 0-.825-.421-.741-.882.393-2.185 1.07-5.952 1.07-5.952s-2.773-2.653-4.382-4.191c-.16-.153-.232-.346-.232-.535 0-.352.249-.694.651-.748 2.211-.305 6.021-.829 6.021-.829s1.677-3.442 2.65-5.44zm.678 2.033v11.904l4.707 2.505-.951-5.236 3.851-3.662-5.314-.756z" fill-rule="nonzero"></path>
                </svg>
              </li>
            </ul>
          </div>
          <div class="mb-12 md:mb-0">
            <div class="mb-6 flex justify-center">
              <img src="{{asset('images\testie.jpg')}}" class="w-32 rounded-full shadow-lg dark:shadow-black/30">
            </div>
            <h5 class="mb-4 text-xl font-semibold">Lisa Cudrow</h5>
            <h6 class="mb-4 font-semibold text-primary dark:text-primary-400">
              Customer
            </h6>
            <p class="mb-4 text-neutral-500">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block h-7 w-7 pr-2" viewBox="0 0 24 24">
                <path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"></path>
              </svg>
              "I had the best haircut of my life at Purple Look Salon and Spa! The stylist listened to exactly what I wanted and then gave me a haircut that exceeded my expectations. I felt so pampered and taken care of throughout the whole process. I can't wait to come back for my next appointment!
            </p>
            <ul class="mb-0 flex items-center justify-center">
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
            </ul>
          </div>
          <div class="mb-0">
            <div class="mb-6 flex justify-center">
              <img src="{{asset('images\testi.jpg')}}" class="w-32 rounded-full shadow-lg dark:shadow-black/30">
            </div>
            <h5 class="mb-4 text-xl font-semibold">Jane Smith</h5>
            <h6 class="mb-4 font-semibold text-primary dark:text-primary-400">
              Loyal Customer
            </h6>
            <p class="mb-4 text-neutral-500">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block h-7 w-7 pr-2" viewBox="0 0 24 24">
                <path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"></path>
              </svg>
              "I had a last-minute hair emergency and Purple Hair Look Salon and Spa saved the day! The staff were able to fit me in right away and they did an amazing job. I can't thank them enough for their professionalism and expertise. I will definitely be coming back!"
            </p>
            <ul class="mb-0 flex items-center justify-center">
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-yellow-500">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                </svg>
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-5 w-5 text-yellow-500" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"></path>
                </svg>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </section>



    <!-- Footer container -->
<footer
class="bg-salonPurple text-center text-neutral-100 lg:text-left">
<div
  class="flex items-center justify-center border-b-2 border-neutral-200 p-6 lg:justify-between">
  <div class="mr-12 hidden lg:block">
    <span>Get connected with us on social networks:</span>
  </div>
  <!-- Social network icons container -->
  <div class="flex justify-center">
    <a href="#!" class="mr-6 text-white dark:text-neutral-200">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4"
        fill="currentColor"
        viewBox="0 0 24 24">
        <path
          d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
      </svg>
    </a>


    <a href="#!" class="mr-6 text-white dark:text-neutral-200">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4"
        fill="currentColor"
        viewBox="0 0 24 24">
        <path
          d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
      </svg>
    </a>


  </div>
</div>

<!-- Main container div: holds the entire content of the footer, including four sections (Tailwind Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
<div class="mx-6 py-10 text-center md:text-left">
  <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
    <!-- Tailwind Elements section -->
    <!-- Contact section -->

    <div>
      <h6
        class="mb-4 flex items-center justify-center font-semibold text-xl md:justify-start">
        <img class="w-20 h-20" src="{{ asset('images/white-logo.png')}}" alt="">
        Purple Look Hair Salon and Spa
    </h6>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="mr-3 h-5 w-5">
          <path
            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
          <path
            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
        </svg>
        Palico Daanan, Bacoor Cavite
      </p>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="mr-3 h-5 w-5">
          <path
            d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
          <path
            d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
        </svg>
        purplelookhairsalonandspa@gmail.com
      </p>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="mr-3 h-5 w-5">
          <path
            fill-rule="evenodd"
            d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
            clip-rule="evenodd" />
        </svg>
        011 554 5521
      </p>

    </div>

    <!-- Services section -->
    <div class="">
      <h6
        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
        Services
      </h6>
      <p class="mb-4">
        <a href="#!" class="text-white dark:text-neutral-200"
          >Hair</a
        >
      </p>
      <p class="mb-4">
        <a href="#!" class="text-white dark:text-neutral-200"
          >Nails</a
        >
      </p>
      <p class="mb-4">
        <a href="#!" class="text-white dark:text-neutral-200"
          >Skin</a
        >
      </p>
      <p>
        <a href="#!" class="text-white dark:text-neutral-200"
          >Makeup</a
        >
      </p>
    </div>
    <!-- Promotions section -->
    <div class="">
      <h6
        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
       Branches
      </h6>
      <p class="mb-4">
        <a href="#!" class="text-neutral-600 dark:text-neutral-200"
          >Special Offers</a
        >
      </p>
      <p class="mb-4">
        <a href="#!" class="text-neutral-600 dark:text-neutral-200"
          >Loyalty Program</a
        >
      </p>
      <p class="mb-4">
        <a href="#!" class="text-neutral-600 dark:text-neutral-200"
          >Loyalty teirs</a
        >
      </p>

    </div>

  </div>
</div>

<!--Copyright section-->
<div class="bg-white p-2 text-center">
  <span class="text-neutral-500">© 2024 Copyright:</span>
  <a
    class="font-semibold text-neutral-600"
    href="/"
    >Purple Look Hair Salon and Spa</a
  >
</div>
</footer>
<script>
  // hide offer-banner when user clicks on close
  document.getElementById("offer-banner-close").addEventListener("click", function() {
    document.getElementById("offer-banner").style.display = "none";
  });

</script>

</x-app-layout>
