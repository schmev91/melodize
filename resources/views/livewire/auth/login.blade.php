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
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4 opacity-70"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5"
                    />
                </svg>
            </x-form.input-inline>

            {{-- PASSWORD --}}
            <x-form.input-inline
                name="form.password"
                type="password"
                placeholder="Password"
                required
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70"
                >
                    <path
                        fill-rule="evenodd"
                        d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                        clip-rule="evenodd"
                    />
                </svg>
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
