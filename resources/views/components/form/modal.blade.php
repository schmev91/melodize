<!-- No surplus words or unnecessary actions. - Marcus Aurelius -->

@props([
    "id" => "",
    "method" => "",
])
<dialog id="{{ $id }}" class="modal">
    <div class="modal-box">
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
            class="modal-content flex flex-col gap-3 py-4"
            {{-- action="{{ $actionStore }}" --}}
            wire:submit="store($event)"
            onsubmit="{{ $id }}.close()"
        >
            @csrf
            <div class="prose mb-5">
                <h1 class="prose-h3:">
                    {{ $title ?? "Modal Title" }}
                </h1>
            </div>

            {{ $slot }}

            <div class="form-btns flex justify-end gap-3">
                <span class="btn btn-neutral" onclick="{{ $id }}.close()">
                    Close
                </span>
                <button
                    class="btn btn-neutral border-hypergreen bg-hypergreen text-white"
                    type="submit"
                >
                    Submit
                </button>
            </div>
        </form>
    </div>

    {{-- overlay-close_btn --}}
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
