{{-- Stop trying to control. --}}
<x-layouts.backdoor>
    <x-backdoor.table-header title="Genres" modalId="genreCreate" />

    <div class="rounded-boxp-5 mt-5 overflow-hidden overflow-x-auto">
        <table class="table text-white">
            <!-- head -->
            <thead>
                <tr class="text-white">
                    <th></th>
                    <th>Genre Name</th>
                    <th>Tracks</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $i)
                    <tr>
                        <th>{{ $i->id }}</th>
                        <td>{{ $i->name }}</td>
                        <td>{{ $i->tracks_count }}</td>
                        <td>{{ $i->updated_at }}</td>
                        <td>
                            <div class="flex gap-2">
                                <x-form.hyper-btn
                                    modalId="genreEdit"
                                    class="btn btn-info btn-sm"
                                    target="{{ $i->id }}"
                                >
                                    Edit
                                </x-form.hyper-btn>
                                <x-form.hyper-btn
                                    modalId="confirm_deleteGenre"
                                    class="btn btn-error btn-sm text-white"
                                    :target="$i->id"
                                >
                                    Delete
                                </x-form.hyper-btn>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pt-2">
            {{ $genres->links() }}
        </div>
    </div>

    @include("backdoor.genres.create")
    @include("backdoor.genres.edit")

    <x-form.confirm-delete id="confirm_deleteGenre" varying="target" />
</x-layouts.backdoor>
