{{-- Stop trying to control. --}}
<div>
    <x-backdoor.table-header title="Genres" modalId="genreModal" />

    <div class="mt-5 overflow-hidden overflow-x-auto rounded-box bg-wall p-5">
        <table class="table text-white">
            <!-- head -->
            <thead>
                <tr class="text-white">
                    <th></th>
                    <th>Genre Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $i)
                    <tr>
                        <th>{{ $i->id }}</th>
                        <td>{{ $i->name }}</td>
                        <td>{{ $i->created_at }}</td>
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
            {{ $genres->links() }}
        </div>
    </div>

    @include("backdoor.genres.modal")
</div>
