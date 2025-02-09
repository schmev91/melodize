@props([
    "size" => 6,
])
<button {{ $attributes }}>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    {{ $slot }}
    <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        class="size-{{ $size }}"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z"
        />
    </svg>
</button>
