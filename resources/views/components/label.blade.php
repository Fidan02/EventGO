@props(['value'])

<label class="text-center text-light fw-bold w-100" >
    {{ $value ?? $slot }}
</label>
