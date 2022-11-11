<x-layout title="Activity | Edukar Scholarship">
    <section>
        <x-container>
            <div class="container mt-4 mb-3">
                <div class="h4 fw-bold pt-1">
                    <span class="text-muted me-2">{{ strtoupper(date('j F', strtotime($activity->created_at ))) }}</span>
                    {{ $activity->title }}
                </div>
            </div>
            <div class="container d-flex justify-content-center">
                <img class="img-fluid shadow" src="{{ $activity->url }}" alt="">
            </div>
            <div class="container mt-5">
                <div class="h5">{!! $activity->body !!}</div>
            </div>
        </x-container>
    </section>
</x-layout>
