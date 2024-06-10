@props([
    "name" => "",
    "type" => "text",
    "value" => null,
    "placeholder" => "",
    "required" => null,
])

<div>
    <label class="input input-bordered flex items-center gap-2">
        {{ $slot }}

        <input
            wire:model="{{ $name }}"
            @if ($value)
                value="{{ $value }}"
            @endif
            type="{{ $type }}"
            class="{{ $attributes["class"] }} grow border-none focus:ring-0"
            placeholder="{{ $placeholder }}"
            {{ $attributes->except("class", "required", "") }}
            {{ $required ? "required" : "" }}
        />
    </label>
    @error($name)
        <small class="error_holder text-red-400">{{ $message }}</small>
    @enderror
</div>
