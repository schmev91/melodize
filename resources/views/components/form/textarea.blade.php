<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->

@props([
    "name" => "",
    "rows" => "3",
    "value" => "",
    "required" => null,
])
@php
    if (old($name)) {
        $value = old($name);
    } elseif (empty($value)) {
        $value = "";
    }
@endphp

<div>
    <label for="{{ $name }}" class="form-label mb-1">
        {{ $slot }}@if ($required)<sup class="text-danger">*</sup>
        @endif
    </label>
    <textarea
        wire:model="{{ $name }}"
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        class="{{ $attributes["class"] }} textarea textarea-bordered w-full"
        {{ $attributes->except("class") }}
        {{ $required ? "required" : "" }}
    >
{{ $value }}</textarea
    >
    @error($name)
        <small class="error_holder text-danger">{{ $message }}</small>
    @enderror
</div>
