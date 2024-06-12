@php
    /**
    * @author schmev91
    * TAG x-form.confirm-delete
    * @param string $id The ID of the modal
    * @param string $action The submit URL
    * @param string|null $confirmText Default: Confirm | The placeholder for the cofirm button
    * @param string|null $varying (Optional) Enable dynamic target when provided | Specifies the name of the value holder attribute
    */
@endphp

@props([
    "id" => "",
    "action" => "",
    "varying" => null,
    "isNormal" => false,
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
            onclick="{{ $id }}.close()"
            {{-- action="{{ $action }}" --}}
        >
            @csrf
            @method("DELETE")
            <div class="prose mb-5">
                <h1 class="prose-h3:">
                    {{ $title ?? "Are you sure you want to delete this?" }}
                </h1>
            </div>

            <div class="form-btns flex justify-end gap-3">
                <span class="btn btn-neutral" onclick="{{ $id }}.close()">
                    Abort
                </span>
                <x-form.hyper-btn class="btn btn-error text-white">
                    {{ $confirmText ?? "Confirm" }}
                </x-form.hyper-btn>
            </div>
        </form>
    </div>

    {{-- overlay-close_btn --}}
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

{{-- ENABLE IF $varying is PROVIDED --}}
@if ($varying)
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            {{ $id }}.addEventListener(
                'open',
                function ({ detail: { button } }) {
                    // Extract info from data-bs-* attributes
                    const value = button.getAttribute('{{ $varying }}');

                    const form = document.getElementById('{{ $id }}-inner');
                    form.setAttribute(
                        '{{ $isNormal ? "action" : "wire:submit" }}',
                        `{{ $isNormal ? $action . '/${value}' : destroy(${value}) }}`,
                    );
                    console.log(form);
                },
            );
        });
    </script>
@endif
