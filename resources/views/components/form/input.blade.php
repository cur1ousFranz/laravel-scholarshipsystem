@props(['name', 'type' => 'text', 'disable' => false])

<div {{ $attributes(['class' => '']) }}>
    <x-form.label :name="$name"/>

    <input class="shadow-sm form-control" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
    style="background-color: #fff;"
    {{ $disable ? 'disabled' : '' }}
    {{ $attributes(['value' => old($name), 'readonly' => false]) }}
    autocomplete="off">

    <x-form.error :name="$name"/>
</div>

{{--

<x-form.label name="name"/>
<x-form.error name="name"/>

--}}
