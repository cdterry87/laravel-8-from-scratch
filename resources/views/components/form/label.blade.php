@props(['for', 'label'])

<label
  for="{{ $for }}"
  class="block mb-2 uppercase font-bold text-xs text-gray-700"
>
  {{ ucwords($label) }}
</label>
