@props(['type' => 'submit'])

<button {{ $attributes(['class' => "shadow-sm btn btn-outline-primary"]) }} type="{{ $type }}">
    {{ $slot }}
</button>
