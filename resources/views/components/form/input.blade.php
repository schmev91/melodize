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

    $inputID = uniqid() . "-" . $name;
@endphp

<div class="flex flex-col">
    <label
        for="{{ $inputID }}"
        class="label label-text justify-start gap-1 font-medium"
    >
        {{ $slot }}
        @if ($required)
            <span class="text-lg text-red-500">*</span>
        @endif
    </label>
    <input
        id="{{ $inputID }}"
        wire:model="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        type="{{ $type }}"
        class="{{ $attributes["class"] }} input input-bordered py-0"
        {{ $attributes->except("class") }}
        {{ $required ? "required" : "" }}
    />
    @error($name)
        <small class="error_holder mt-1 text-error">{{ $message }}</small>
    @enderror
</div>
