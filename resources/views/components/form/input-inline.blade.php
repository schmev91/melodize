@props([
    "name" => "",
    "type" => "text",
    "value" => null,
    "placeholder" => "",
    "required" => null,
    "isConfirmPassword" => false,
])

<div>
    <label class="input input-bordered flex items-center gap-2">
        {{ $slot }}

        <input
            wire:model="{{ $name }}"
            name="{{ $name }}"
            @if ($value)
                value="{{ $value }}"
            @endif
            type="{{ $type }}"
            class="{{ $attributes["class"] }} grow border-none focus:ring-0"
            placeholder="{{ $placeholder }}"
            {{ $attributes->except("class", "required", "") }}
            {{ $required ? "required" : "" }}
            {{ $isConfirmPassword ? 'name="password_confirmation"' : "" }}
        />
    </label>
    @error($name)
        <small class="error_holder text-red-400">{{ $message }}</small>
    @enderror
</div>
