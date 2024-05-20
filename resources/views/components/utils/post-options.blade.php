@props([
    "route" => "",
    "condition" => false,
])
<a
    href="{{ $route }}"
    class="{{ $condition ? "badge-primary" : "badge-outline" }} badge"
>
    {{ $slot }}
</a>
