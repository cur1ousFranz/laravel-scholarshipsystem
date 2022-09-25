<x-layout title="Home | Edukar Scholarship">
    <section>
        <x-container>
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <x-card-primary-border>
                            <div class="h5">
                                Activities
                            </div>
                            <hr>
                            <ul class="list-group">
                                @if (!$activities->isEmpty())
                                    @foreach ($activities as $activity)
                                        <li class="list-group-item border-0">
                                            <div class="d-flex">
                                                <div class="h4 fw-bold pt-1">
                                                    <span class="text-muted me-2">{{ strtoupper(date('j F', strtotime($activity->created_at ))) }}</span>
                                                    {{ strtoupper($activity->title) }}
                                                </div>

                                            </div>
                                            <div class="cut-text">
                                                {!! $activity->body !!}
                                            </div>
                                            <div class="mb-2 mt-3">
                                                <a class="btn btn-primary float-end" target="_blank" href="/activity/{{ $activity->slug }}">Read more</a>
                                            </div>
                                        </li>
                                        <hr>
                                    @endforeach
                                    <div class="d-flex justify-content-center mt-3">
                                        <a href="/activity" class="btn btn-secondary">View All</a>
                                    </div>
                                @else
                                    <li class="list-group-item border-0">
                                        <div class="h6 pt-1 text-center">
                                            No activity post yet.
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </x-card-primary-border>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <x-card-primary-border>
                            <ul class="list-group border-0">
                                <li class="list-group-item border-0">
                                    <button class="btn form-control text-start"
                                    data-bs-toggle="modal"data-bs-target="#activity">
                                    <i class="bi bi-card-checklist me-2"></i>Activities
                                        <span><i class="bi bi-plus-square float-end"></i></span>
                                    </button>
                                </li>
                                <li class="list-group-item border border-top border-1 border-bottom-0 border-end-0 border-start-0">
                                    <button class="btn form-control text-start"
                                    data-bs-toggle="modal"data-bs-target="#scholars">
                                    <i class="bi bi-card-image me-2"></i>Scholars
                                        <span><i class="bi bi-plus-square float-end"></i></span>
                                    </button>
                                </li>
                              </ul>
                        </x-card-primary-border>
                    </div>

                    <div class="card mt-3">
                        <x-card-primary-border>
                            <div class="h6"><i class="bi bi-card-heading me-1"></i>
                                Scholarship Applications
                            </div>
                            <ul class="list-group border-0"  style="max-height: 230px; overflow-y: auto">
                                @forelse ($applications as $application)
                                    <li class="list-group-item border-0">
                                        {{ $application->batch }}
                                        <span class="float-end fw-bold {{ $application->status === "On-going" ? 'text-success' : 'text-danger' }}">
                                            {{ $application->status }}
                                        </span>
                                        <p style="font-size: 12px">{{ date('F j, Y', strtotime($application->created_at)) }}</p>
                                        <hr>
                                    </li>
                                @empty
                                    <li class="list-group-item border-0 text-center">
                                        <p>No applications yet.</p>
                                    </li>
                                @endforelse
                              </ul>
                        </x-card-primary-border>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="activity">
                <div class="modal-dialog modal-lg modal-dialog-centered text-center">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <h4 class="modal-title">Post Activity</h4>
                        </div>
                        <form action="/activity" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-start">
                                            <x-form.label name="title"/>
                                            <input class="shadow-sm form-control" id="title" name="title"
                                            style="background-color: #fff;"
                                            autocomplete="off" value="{{ old('title') }}">

                                            @error('title')
                                                @php
                                                    back()->with('error', 'Title already exist!');
                                                @endphp
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-start">
                                            <x-form.label name="image"/>
                                            <input class="shadow-sm form-control" id="image" name="image"
                                            style="background-color: #fff;" type="file" accept="image/png, image/jpg, image/jpeg">

                                            @error('image')
                                                @php
                                                    back()->with('error', 'Invalid format!');
                                                @endphp
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <div class="text-start">
                                                <p>Format must be: PNG, JPG, JPEG</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-start mt-2">
                                    <x-form.label name="body"/>
                                    <textarea class="form-control shadow-sm" name="body" id="editor">{{ old('body') }}</textarea>
                                    <x-form.error name="body"/>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-end">
                                <x-form.button class="btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</x-form.button>
                                <x-form.button type="submit">Post</x-form.button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="scholars">
                <div class="modal-dialog modal-dialog-centered text-center">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <h4 class="modal-title">Post Scholar</h4>
                        </div>
                        <form action="/scholar" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="text-start">
                                    <x-form.label name="image"/>
                                    <input class="shadow-sm form-control" id="image" name="image"
                                    style="background-color: #fff;" type="file" accept="image/png, image/jpg, image/jpeg">

                                    @error('image')
                                        @php
                                            back()->with('error', 'Invalid format!');
                                        @endphp
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="text-start">
                                        <p>Format must be: PNG, JPG, JPEG</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-end">
                                <x-form.button class="btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</x-form.button>
                                <x-form.button type="submit">Post</x-form.button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
</x-layout>
