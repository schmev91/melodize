<!-- No surplus words or unnecessary actions. - Marcus Aurelius -->

@props([
    "id" => "",
])
<dialog id="{{ $id }}" {{ $attributes->merge(["class" => "modal"]) }}>
    <div class="modal-box max-w-max">
        <form method="dialog">
            <button
                class="btn btn-circle btn-ghost btn-sm absolute right-2 top-2"
            >
                ✕
            </button>
        </form>

        {{ $slot }}
    </div>

    {{-- overlay-close_btn --}}
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
