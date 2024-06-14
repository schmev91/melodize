<div>
    {{-- LOGIN MODAL --}}
    <x-form.modal id="login_modal" action="login">
        <x-slot name="title">Login</x-slot>

        @if (session("login_message"))
            {!! session("login_message") !!}
        @endif

        {{-- LOGIN NAME --}}
        <x-form.input-inline name="logination.username" placeholder="username">
            <x-svg.hashtag />
        </x-form.input-inline>

        {{-- PASSWORD --}}
        <x-form.input-inline
            name="logination.password"
            type="password"
            placeholder="Password"
            autocomplete
        >
            <x-svg.key />
        </x-form.input-inline>

        <x-slot name="widget">
            <button
                type="button"
                @click="login_modal.close();forgotPassword_modal.show()"
                class="h-fit text-sm italic text-blue-400 underline"
            >
                Forgot password?
            </button>
        </x-slot>
    </x-form.modal>
</div>
