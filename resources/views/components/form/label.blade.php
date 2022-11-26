@props(['name'])

<div {{ $attributes(['class' => '']) }}>
    <label for="{{ $name }}">
        <h6>{{ ucwords(str_replace('_', ' ', $name)) }}</h6>
    </label>
</div>
