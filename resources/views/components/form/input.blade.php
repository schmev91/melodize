@props([
    "name" => "",
    "type" => "text",
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
    <label for="{{ $name }}" class="label-text mb-1">
        {{ $slot }}
        @if ($required)
            <sup class="text-danger">*</sup>
        @endif
    </label>
    <input
        wire:model="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        type="{{ $type }}"
        class="{{ $attributes["class"] }} form-control"
        {{ $attributes->except("class") }}
        {{ $required ? "required" : "" }}
    />
    @error($name)
        <small class="error_holder text-red-400">{{ $message }}</small>
    @enderror
</div>
