<!-- No surplus words or unnecessary actions. - Marcus Aurelius -->

@props([
    "id" => "",
    "storeTitle" => "",
    "updateTitle" => "",
])
<dialog id="{{ $id }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button
                class="btn btn-circle btn-ghost btn-sm absolute right-2 top-2"
            >
                ✕
            </button>
        </form>

        <form
            method="post"
            id="{{ $id }}-inner"
            class="modal-content flex flex-col gap-3 py-4"
            wire:submit="store"
            onsubmit="{{ $id }}.close()"
        >
            @csrf
            <div class="prose mb-5">
                <h1 class="modal-title prose-h3:">
                    {{ $storeTitle ?? "Modal Title" }}
                </h1>
            </div>

            {{ $slot }}

            <div class="form-btns flex justify-end gap-3">
                <span class="btn btn-neutral" onclick="{{ $id }}.close()">
                    Close
                </span>
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>

    {{-- overlay-close_btn --}}
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

@script
    <script type="module">
        const hyperForm = document.getElementById('{{ $id }}-inner');
        const methodHolder = hyperForm.querySelector('input[name="_method"]');
        const submitBtn = hyperForm.querySelector('button[type="submit"]');

        const addColor = 'btn-success';
        const editColor = 'btn-info';

        const morphToCreate = morph(
            'store',
            'Create',
            addColor,
            '{{ $storeTitle }}',
        );
        const morphToUpdate = morph(
            'update',
            'Save',
            editColor,
            '{{ $updateTitle }}',
        );

        {{ $id }}.addEventListener('close', () => {
            setTimeout(() => {
                morphToCreate();
            }, 300);
        });

        function morph(action, buttonText, buttonColor, title) {
            return function (value = null) {
                let attributeValue = action;
                if (value) attributeValue += `(${value})`;
                hyperForm.setAttribute('wire:submit', attributeValue);

                hyperForm.querySelector('.modal-title').innerHTML = title;

                submitBtn.innerHTML = buttonText;
                if (buttonColor == addColor)
                    submitBtn.classList.replace(editColor, addColor);
                else submitBtn.classList.replace(addColor, editColor);
            };
        }

        const editBtn_collections =
            document.getElementsByClassName('btn-open_edit');
        for (const btn of editBtn_collections) {
            btn.addEventListener('click', prepareEdit);
        }

        function prepareEdit({ target }) {
            morphToUpdate(target.getAttribute('target'));
            {{ $id }}.show();
        }
    </script>
@endscript
