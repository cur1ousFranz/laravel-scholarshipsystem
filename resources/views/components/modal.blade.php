@props(['name', 'content'])

<div class="modal fade" id="{{ $name }}">
    <div class="modal-dialog modal-dialog-centered text-center">
        <div {{ $attributes(["class"=> "modal-content"]) }}>
            <div class="modal-header d-flex justify-content-center">
                <h4 class="modal-title">{{ $header }}</h4>
            </div>
            <div class="modal-body">
                <h5>{{ $body }}</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                {{ $footer }}
            </div>
        </div>
    </div>
</div>
