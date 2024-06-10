<x-form.modal id="login_modal" action="login">
    <x-slot name="title">Login</x-slot>

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
</x-form.modal>
