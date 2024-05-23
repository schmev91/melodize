{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<dialog id="register_modal" class="modal">
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
            id="register_form"
            class="modal-content flex flex-col gap-3 py-4"
        >
            <div class="prose mb-5">
                <h1 class="prose-h3:">Register</h1>
            </div>

            {{-- LOGIN NAME --}}
            <x-form.input-inline
                name="form.username"
                placeholder="Login Name"
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

            {{-- EMAIL --}}
            <x-form.input-inline
                name="form.email"
                type="email"
                placeholder="Email"
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
                        d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"
                    />
                </svg>
            </x-form.input-inline>

            {{-- YOUR NAME --}}
            <x-form.input-inline
                name="form.name"
                placeholder="Your name"
                required
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70"
                >
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"
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
                <span class="btn btn-neutral" onclick="register_modal.close()">
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
