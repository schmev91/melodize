<x-layouts.backdoor>
    {{-- The Master doesn't talk, he acts. --}}
    <x-backdoor.table-header title="Users" modalId="" />

    <div class="mt-5 overflow-x-auto rounded-box p-5">
        <table class="table text-white">
            <!-- head -->
            <thead>
                <tr class="text-white">
                    <th></th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i)
                    <tr>
                        <th>{{ $i->id }}</th>
                        <td>
                            <div class="flex items-center gap-3">
                                <img
                                    class="h-12 w-12 rounded-md object-cover"
                                    src="{{ Storage::url($i->avatar) }}"
                                    alt=""
                                />
                                <span>
                                    {{ $i->username }}
                                </span>
                            </div>
                        </td>
                        <td>{{ $i->email }}</td>
                        <td>{{ $i->created_at }}</td>
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
            {{ $users->links() }}
        </div>
    </div>
</x-layouts.backdoor>
