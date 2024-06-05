<!-- Simplicity is an acquired taste. - Katharine Gerould -->
<x-form.modal id="manageGenre" btnText="Save" btnType="primary">
    <div class="flex h-96 w-[50vw] gap-5">
        <div class="dropdown">
            <div tabindex="0" role="button" class="">
                <input
                    type="text"
                    class="input input-bordered w-52"
                    placeholder="Search for genres..."
                />
            </div>
            <div
                class="menu dropdown-content z-10 mt-1 flex max-h-80 w-52 flex-col flex-nowrap gap-1 overflow-y-scroll bg-base-100 p-0"
            >
                @foreach ($genres as $genre)
                    <button class="btn bg-white">
                        {{ $genre->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="flex h-full grow flex-col gap-3">
            <span class="text-lg font-medium">Genre</span>
            <div class="flex flex-wrap gap-2 p-3">
                @foreach ($genres as $genre)
                    <span class="badge badge-neutral flex gap-1 font-medium">
                        #{{ $genre->name }}
                        <button class="text-wall"><x-svg.cross-mark /></button>
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</x-form.modal>
