<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

@props([
    "user" => [],
    "label" => "",
    "name" => "",
    "type" => "text",
    "placeholder" => "",
])
<div class="field flex flex-col">
    <label for="{{ $name }}" class="label font-medium">{{ $label }}</label>
    <div
        class="flex gap-2"
        x-data="{ isEditing: false }"
        @profile-updated.window="isEditing = false"
    >
        <input
            wire:model="profile.{{ $name }}"
            id="{{ $name }}"
            type="{{ $type }}"
            class="input input-md input-bordered disabled:bg-slate-100"
            :disabled="!isEditing"
            placeholder="{{ $placeholder }}"
        />

        <button
            x-show="!isEditing"
            @click="isEditing = true"
            type="button"
            class="btn btn-neutral h-12 w-12 bg-wall bg-opacity-50"
        >
            <x-svg.pen class="size-4 stroke-white" />
        </button>
        <button
            wire:click="change('{{ $name }}')"
            x-show="isEditing"
            type="button"
            class="btn btn-info h-12 w-12"
        >
            <x-svg.disk-save class="size-4 stroke-white stroke-2" />
        </button>
    </div>
    @error("profile.$name")
        <small class="error_holder mt-1 text-error">{{ $message }}</small>
    @enderror
</div>
