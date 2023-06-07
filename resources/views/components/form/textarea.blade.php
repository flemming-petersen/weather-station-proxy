@props([
    'name',
    'value' => null,
])

<textarea rows="10" class="mb-8 border-solid border-2 border-black rounded p-2" name="{{ $name }}" id="{{ $name }}">{{ $value }}</textarea>
