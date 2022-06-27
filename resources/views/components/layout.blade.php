<div {{ $attributes->merge(['class' => "container-fluid border-top", 'style' => "height: 100vh; margin-top: 50px"]) }}>
    <div class="container mt-5">
        {{ $slot }}
    </div>
</div>
