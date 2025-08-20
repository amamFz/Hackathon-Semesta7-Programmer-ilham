@props(['disabled' => false, 'rows' => 3])

<textarea @disabled($disabled) rows="{{ $rows }}"
  {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full']) }}>{{ $slot }}</textarea>
