@props(['name'])

@error($name )
    <p class="text-danger position-absolute text-sm">{{ $message }}</p>
@enderror
