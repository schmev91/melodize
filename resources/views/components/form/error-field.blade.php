@props([
    "name" => "",
])
<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
@error($name)
    <small class="error_holder mt-1 max-w-36 text-error">
        {{ $message }}
    </small>
@enderror
