{{-- Care about people's approval and you will be their prisoner. --}}
{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<dialog id="login_modal" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button
                class="btn btn-circle btn-ghost btn-sm absolute right-2 top-2"
            >
                ✕
            </button>
        </form>

        <form
            wire:submit="submitForm"
            id="login_form"
            class="modal-content flex flex-col gap-3 py-4"
        >
            <div class="prose mb-5">
                <h1 class="prose-h3:">Login</h1>
            </div>

            {{-- LOGIN NAME --}}
            <x-form.input-inline
                name="form.username"
                placeholder="username"
                required
            >
                <x-svg.hashtag />
            </x-form.input-inline>

            {{-- PASSWORD --}}
            <x-form.input-inline
                name="form.password"
                type="password"
                placeholder="Password"
                required
            >
                <x-svg.key />
            </x-form.input-inline>
            <div class="form-btns flex justify-end gap-3">
                <span class="btn btn-neutral" onclick="login_modal.close()">
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
