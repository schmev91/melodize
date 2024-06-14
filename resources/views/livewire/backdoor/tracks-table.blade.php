<x-layouts.backdoor>
    <x-backdoor.table-header title="Tracks" modalId="trackModal" />

    <div class="mt-5 overflow-x-auto rounded-box p-5">
        <table class="table text-white">
            <!-- head -->
            <thead>
                <tr class="text-white">
                    <th></th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Updated at</th>
                    <th></th>
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
                                @include("backdoor.tracks.dropdown")
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

    <x-form.confirm-delete
        id="confirm_deleteTrack"
        :action="route('api.tracks.destroy', '')"
        varying="target"
    />

    @include("backdoor.tracks.manage-genre")
    @include("backdoor.tracks.create")
</x-layouts.backdoor>
