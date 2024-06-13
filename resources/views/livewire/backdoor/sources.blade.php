<x-layouts.backdoor>
    {{-- The best athlete wants his opponent at his best. --}}
    <x-backdoor.table-header title="Sources" modalId="sourceModal" />

    <div class="mt-5 overflow-hidden overflow-x-auto rounded-box bg-wall p-5">
        <table class="table text-white">
            <!-- head -->
            <thead>
                <tr class="text-white">
                    <th></th>
                    <th>Source Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sources as $i)
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
            {{ $sources->links() }}
        </div>
    </div>

    @include("backdoor.sources.modal")
</x-layouts.backdoor>
