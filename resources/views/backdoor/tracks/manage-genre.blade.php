<!-- Simplicity is an acquired taste. - Katharine Gerould -->
<x-form.modal id="manageGenre" btnText="Save" btnType="primary">
    <x-slot name="title">Manage track genre</x-slot>

    <div id="manageGenre-loading" class="flex justify-center">
        <span class="loading loading-bars loading-lg"></span>
    </div>

    <div
        id="manageGenre-content"
        class="hidden"
        x-data="{
            genreList:
                {{ json_encode($genres, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) }},
            trackGenres: [],
            searchGenre: '',
            get filteredGenres() {
                return this.genreList.filter(
                    ({ id: genreId, name }) =>
                        ! this.trackGenres.some(
                            ({ id: existGenreId }) =>
                                genreId === existGenreId ||
                                (this.searchGenre
                                    ? ! name
                                          .toLowerCase()
                                          .includes(this.searchGenre.toLowerCase())
                                    : false),
                        ),
                )
            },
            addGenre(genre) {
                this.trackGenres.push(genre)
            },
            removeGenre(id) {
                this.trackGenres.some(({ genreId }, index) => {
                    if (! id == genreId) return false
                    this.trackGenres.splice(index, 1)
                    return true
                })
            },
        }"
        @track-genres-load.window="trackGenres = $event.detail.genres"
    >
        <div class="flex h-96 gap-5">
            <div class="dropdown">
                <div tabindex="0" role="button" class="">
                    <input
                        type="text"
                        class="input input-bordered w-52"
                        x-model="searchGenre"
                        placeholder="Search for genres..."
                    />
                </div>
                {{-- GENRES DROPDOWN --}}
                <div
                    class="menu dropdown-content z-10 mt-1 flex max-h-80 w-52 flex-col flex-nowrap gap-1 overflow-y-scroll bg-base-100 p-0"
                >
                    <template
                        x-for="genre in filteredGenres"
                        :key="genre.id"
                    >
                        <button
                            @click="addGenre(genre)"
                            type="button"
                            class="btn bg-white"
                        >
                            <span x-text="genre.name"></span>
                        </button>
                    </template>
                </div>
            </div>

            {{-- TRACK'S GENRES --}}
            <div class="flex h-full grow flex-col gap-3">
                <span class="text-lg font-medium" @click="$dispatch('foo')">
                    Genre
                </span>
                <div class="flex min-w-72 max-w-72 flex-wrap gap-2 p-3">
                    <template x-for="genre in trackGenres" :key="genre.id">
                        <span
                            class="badge badge-neutral flex gap-1 font-medium"
                        >
                            #
                            <span x-text="genre.name"></span>
                            <button
                                @click="removeGenre(genre.id)"
                                type="button"
                                class="text-wall"
                            >
                                <x-svg.cross-mark />
                            </button>
                        </span>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-form.modal>
@script
    <script type="module">
        const loading = document.getElementById('manageGenre-loading');
        const content = document.getElementById('manageGenre-content');
        const hideClass = 'hidden';

        manageGenre.addEventListener('close', () => {
            content.classList.add(hideClass);
            loading.classList.remove(hideClass);
        });

        manageGenre.addEventListener('open', ({ detail: { button } }) => {
            const target = button.getAttribute('target');
            // API url to get genres of a specific track
            const url = window.location.origin + `/api/tracks/${target}/genres`;
            fetch(url)
                .then((r) => r.json())
                .then((genres) => {
                    window.dispatchEvent(createLoadEvent(genres));

                    loading.classList.add(hideClass);
                    content.classList.remove(hideClass);
                });
        });

        function createLoadEvent(data) {
            const event = new CustomEvent('track-genres-load', {
                detail: {
                    genres: data,
                },
            });

            return event;
        }
    </script>
@endscript
