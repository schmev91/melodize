<x-form.modal id="sourceModal">
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <x-slot name="title">Add New Source</x-slot>

    {{-- LOGIN NAME --}}
    <x-form.input-inline name="form.username" placeholder="username" required>
        <x-svg.hashtag />
    </x-form.input-inline>

    {{-- PASSWORD --}}
    <x-form.input-inline
        name="form.password"
        type="password"
        placeholder="Password"
        required
        autocomplete
    >
        <x-svg.key />
    </x-form.input-inline>
</x-form.modal>
