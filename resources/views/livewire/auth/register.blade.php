<x-form.modal id="register_modal" action="register">
    {{-- LOGIN NAME --}}
    <x-slot name="title">Register</x-slot>

    <x-form.input-inline name="registration.username" placeholder="Login Name">
        <x-svg.hashtag />
    </x-form.input-inline>

    {{-- EMAIL --}}
    <x-form.input-inline
        name="registration.email"
        type="text"
        placeholder="Email"
    >
        <x-svg.at />
    </x-form.input-inline>

    {{-- YOUR NAME --}}
    <x-form.input-inline name="registration.name" placeholder="Your name">
        <x-svg.person />
    </x-form.input-inline>

    {{-- PASSWORD --}}
    <x-form.input-inline
        name="registration.password"
        type="password"
        placeholder="Password"
        autocomplete
    >
        <x-svg.key />
    </x-form.input-inline>
</x-form.modal>
