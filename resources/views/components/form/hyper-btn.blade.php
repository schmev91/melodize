<!-- Order your soul. Reduce your wants. - Augustine -->

@props([
    "modalId" => "",
])

<button
    onclick="{{ $modalId }}.showModal();{{ $modalId }}.dispatchEvent(new CustomEvent('open', { detail: { button: this } }))"
    {{ $attributes }}
>
    {{ $slot }}
</button>
