@props(['name', 'label', 'items' => []])

<x-form.field>
  <x-form.label for="{{ $name }}" label="{{ $label }}"/>

  <label for="{{ $name }}" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ $label }}</label>
  <select name="{{ $name }}" id="{{ $name }}">
    @foreach ($items as $item)
      <option value="{{ $item->id }}" {{ old('category_id' == $item->id ? 'selected' : '') }}>{{ ucwords($item->name) }}</option>
    @endforeach
  </select>
  
  <x-form.error name="{{ $name }}" />
</x-form.field>