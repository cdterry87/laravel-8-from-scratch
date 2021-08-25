@props(['name'])

<x-form.field>
  <x-form.label for="{{ $name }}" label="{{ $name }}"/>
  <textarea class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}">{{ old($name) }}</textarea>
  <x-form.error name="{{ $name }}" />
</x-form.field>