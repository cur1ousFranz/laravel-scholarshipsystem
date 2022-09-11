<x-layout title="Activity | Edukar Scholarship">
    <section>
        <x-container>
            @foreach ($activities as $activity)
                <div class="container d-flex justify-content-center mt-5">
                    <img class="img-fluid shadow" src="{{ asset('storage/' . $activity->image) }}" alt="">
                </div>
                <div class="container mt-4">
                    <div class="h1 fw-bold pt-1">
                        <span class="text-muted me-2">{{ strtoupper(date('j F', strtotime($activity->created_at ))) }}</span>
                        {{ $activity->title }}
                    </div>
                </div>
                <div class="container mt-5 cut-text">
                    <div class="h5">{!! $activity->body !!}</div>
                </div>
                <div class="container">
                    <a class="btn btn-secondary float-start mb-5 mt-3" href="/activity/{{ $activity->slug }}">Read more</a>
                </div>
            @endforeach
            <div class="float-end" style="margin-top: 100px">
                {{ $activities->links('pagination::bootstrap-4') }}
            </div>
        </x-container>
    </section>
</x-layout>
