<x-form.modal id="trackModal">
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    <x-slot name="title">Add New Track</x-slot>

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
