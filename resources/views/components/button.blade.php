<button class=" ms-3 w-30" {{ $attributes->merge(['type' => 'submit']) }}>
    <div class="login-btn p-2">
        {{ $slot }}
    </div>
</button>
