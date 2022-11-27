@props(['name'])

<div {{ $attributes(['class' => '']) }}>
    <label for="{{ $name }}">
        <h6>{{ $name === 'gwa' ? 'General Weighted Average' :  ucwords(str_replace('_', ' ', $name)) }}</h6>
    </label>
</div>
