<!-- No surplus words or unnecessary actions. - Marcus Aurelius -->

@props([
    "id" => "",
    "action" => "",
    "btnText" => "Submit",
    "btnType" => "success",
])
<dialog id="{{ $id }}" class="modal">
    <div class="modal-box max-w-max">
        <form method="dialog">
            <button
                class="btn btn-circle btn-ghost btn-sm absolute right-2 top-2"
            >
                ✕
            </button>
        </form>

        <form
            method="post"
            id="{{ $id }}-inner"
            class="modal-content flex min-w-96 flex-col gap-3 py-4"
            onsubmit="{{ $id }}.close()"
            wire:submit="{{ $action }}"
        >
            @csrf
            <div class="prose mb-5">
                <h1 class="modal-title prose-h3:">
                    {{ $title ?? "Dialog Title" }}
                </h1>
            </div>

            {{ $slot }}

            <div class="form-btns flex justify-end gap-3">
                <span
                    class="btn btn-neutral bg-gray-500"
                    onclick="{{ $id }}.close()"
                >
                    Close
                </span>
                <button class="btn-{{ $btnType }} btn" type="submit">
                    {{ $btnText }}
                </button>
            </div>
        </form>
    </div>

    {{-- overlay-close_btn --}}
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
