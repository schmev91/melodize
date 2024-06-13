<!-- No surplus words or unnecessary actions. - Marcus Aurelius -->

@props([
    "id" => "",
    "action" => "",
    "btnText" => "Submit",
    "btnType" => "success",
    "isActionNormal" => false,
])
<x-form.modal-core :$id>
    <form
        method="post"
        id="{{ $id }}-inner"
        class="modal-content flex min-w-96 flex-col gap-3 py-4"
        onsubmit="{{ $id }}.close()"
        {{ $isActionNormal ? "action=$action" : "wire:submit=$action" }}
        {{ $attributes }}
    >
        @csrf
        <div class="prose mb-5">
            <h1 class="modal-title prose-h3:">
                {{ $title ?? "Dialog Title" }}
            </h1>
        </div>

        {{ $slot }}

        <div
            class="{{ $widget ?? null ? "justify-between" : "justify-end" }} flex"
        >
            {{ $widget ?? "" }}
            <div class="form-btns flex justify-end gap-3">
                <span
                    class="btn bg-gray-500 text-white"
                    onclick="{{ $id }}.close()"
                >
                    Close
                </span>
                <button class="btn-{{ $btnType }} btn" type="submit">
                    {{ $btnText }}
                </button>
            </div>
        </div>
    </form>
</x-form.modal-core>
