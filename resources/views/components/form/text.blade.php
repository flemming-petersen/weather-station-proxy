@props([
    'name',
    'value' => null,
])

<input class="mb-8 border-solid border-2 border-black rounded p-2" type="text" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}">
