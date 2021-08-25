@props(['name'])

<x-form.field>
  <x-form.label for="{{ $name }}" label="{{ $name }}"/>
  <input 
    class="border border-gray-400 p-2 w-full"
    name="{{ $name }}"
    id="{{ $name }}"
    value="{{ old($name) }}"
    required
    {{ $attributes }}
  >
  <x-form.error name="{{ $name }}" />
</x-form.field>