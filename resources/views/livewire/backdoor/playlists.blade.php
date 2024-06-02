<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <x-backdoor.table-header title="Playlists" modalId="playlistModal" />

    <div class="mt-5 overflow-hidden overflow-x-auto rounded-box bg-wall p-5">
        <table class="table text-white">
            <!-- head -->
            <thead>
                <tr class="text-white">
                    <th></th>
                    <th>Playlist Name</th>
                    <th>Created by</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($playlists as $i)
                    <tr>
                        <th>{{ $i->id }}</th>
                        <td>{{ $i->name }}</td>
                        <div class="flex items-center gap-3">
                            <img
                                class="h-12 w-12 rounded-md object-cover"
                                src="{{ Storage::url("img/default.avatar.jpg") }}"
                                alt=""
                            />
                            <span>Schmev</span>
                        </div>
                        <td>{{ $i->updated_at }}</td>
                        <td>
                            <div class="flex gap-2">
                                <button class="btn btn-info btn-sm text-white">
                                    Edit
                                </button>
                                <button
                                    class="btn btn-sm border-red-400 bg-red-400 text-white"
                                >
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pt-2">
            {{ $playlists->links() }}
        </div>
    </div>

    @include("backdoor.playlists.modal")
</div>
