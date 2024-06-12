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

    {{-- FORGOT PASSWORD MODAL --}}
    <x-form.modal
        id="forgotPassword_modal"
        action="sendPasswordResetCode"
        btnText="Send code"
        btnType="info"
        @submit="$wire.$dispatch('new-toast',{message: 'Please wait a bit and check your email'});resetCodeRedemption_modal.show()"
    >
        <x-slot name="title">Forgot password</x-slot>
        <p class="text-gray-400">
            You will receive a redemption code in your email if you have
            registered with us
        </p>
        <x-form.input-inline
            name="forgotten.forgotPasswordEmail"
            placeholder="Please enter your email"
        >
            <x-svg.at />
        </x-form.input-inline>
    </x-form.modal>

    {{-- RESET CODE REDEMPTION MODAL --}}
    <x-form.modal
        id="resetCodeRedemption_modal"
        action="redeemPasswordResetCode"
        btnType="primary"
    >
        <x-slot name="title">Redeem password reset code</x-slot>

        <p class="text-gray-400">
            Enter the 6 digit code you have received, code expires after 10
            minutes
        </p>
        <x-form.input-inline name="redemption.code" maxlength="6">
            <x-svg.hashtag />
        </x-form.input-inline>
        @if (session("passwordRedemption_message"))
            {!! session("passwordRedemption_message") !!}
        @endif
    </x-form.modal>

    {{-- RESET PASSWORD MODAL --}}
    <x-form.modal
        id="resetPassword_modal"
        action="resetPassword"
        btnType="info"
    >
        <x-slot name="title">Reset password</x-slot>
        <x-form.input-inline
            name="resetPw.password"
            placeholder="Your new password"
            type="password"
            autocomplete="true"
        >
            <x-svg.key />
        </x-form.input-inline>

        <x-form.input-inline
            name="resetPw.confirm"
            placeholder="Confirm password"
            type="password"
            autocomplete="true"
        >
            <x-svg.arrow-path-rounded class="size-4" />
        </x-form.input-inline>
    </x-form.modal>
</div>
