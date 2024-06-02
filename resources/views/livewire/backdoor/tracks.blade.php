<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-backdoor.table-header title="Tracks" modalId="trackModal" />

    <div class="mt-5 overflow-hidden overflow-x-auto rounded-box bg-wall p-5">
        <table class="table text-white">
            <!-- head -->
            <thead>
                <tr class="text-white">
                    <th></th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracks as $i)
                    <tr>
                        <th>{{ $i->id }}</th>
                        <td>
                            <div class="flex items-center gap-3">
                                <img
                                    class="h-12 w-12 rounded-md object-cover"
                                    src="{{ Storage::url($i->cover) }}"
                                    alt=""
                                />
                                <span>
                                    {{ $i->title }}
                                </span>
                            </div>
                        </td>
                        <td>{{ $i->artist }}</td>
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
            {{ $tracks->links() }}
        </div>
    </div>

    @include("backdoor.tracks.modal")
</div>
