@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400']) }}>{{ $message }}</p>
@enderror
