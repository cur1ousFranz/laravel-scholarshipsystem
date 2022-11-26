<x-layout title="Qualifed Applicant">
    <section>
        <x-container class="border shadow-sm">
            <div class="row mt-3">
                <div class="col-lg d-flex">
                    <h4 class="mt-2">Qualified Applicant List</h4>
                    <p class="mt-2 ms-3" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#infoModal">
                        <i class="bi bi-info-circle"></i>
                    </p>
                </div>
                <div class="col-lg">
                    <div class="d-flex float-lg-end">
                        <div>
                            @if (!$qualifiedApplicantList->isEmpty())
                                <span data-bs-toggle="tooltip" data-bs-placement="left" title="Send Announcement">
                                    <button class="btn btn-outline-success me-1" data-bs-toggle="modal" data-bs-target="#message">
                                        <i class="bi bi-envelope-plus-fill"></i>
                                    </button>
                                </span>

                            @else
                                <span data-bs-toggle="tooltip" data-bs-placement="left" title="Send Announcement">
                                    <button class="btn btn-outline-success me-1" disabled>
                                        <i class="bi bi-envelope-plus-fill"></i>
                                    </button>
                                </span>
                            @endif

                            <div class="modal fade" id="message">
                                <div class="modal-dialog modal-lg modal-dialog-centered text-center">
                                    <div class="modal-content border border-dark">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4 class="modal-title">Create Announcement</h4>
                                        </div>
                                        <form action="/applicants/qualified/message/{{ $application->id }}" method="POST">
                                            @csrf

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6 text-start">
                                                        <x-form.label name="title"/>
                                                        <input class="shadow-sm form-control" id="title" name="title"
                                                        style="background-color: #fff;"
                                                        autocomplete="off" value="{{ old('title') }}"
                                                        maxlength="15">

                                                        @error('title')
                                                            @php
                                                                back()->with('error', 'Provide all fields!');
                                                            @endphp
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6 text-start">
                                                        <x-form.label name="coordinator"/>
                                                        <input class="shadow-sm form-control" id="coordinator" name="coordinator"
                                                        style="background-color: #fff;"
                                                        autocomplete="off" value="{{ old('coordinator') }}"
                                                        maxlength="20">

                                                        @error('coordinator')
                                                            @php
                                                                back()->with('error', 'Provide all fields!');
                                                            @endphp
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="text-start mt-2">
                                                    <x-form.label name="message"/>
                                                    <textarea class="form-control shadow-sm" name="message" id="editor">{{ old('message') }}</textarea>

                                                    @error('message')
                                                        @php
                                                            back()->with('error', 'Provide all fields!');
                                                        @endphp
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="text-start ms-3 text-muted">
                                                <p>Note: This announcement will automatically send to all qualified applicants in this batch through notification and email.</p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-end">
                                                <x-form.button class="btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</x-form.button>
                                                <x-form.button type="submit">Send</x-form.button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <form action="">
                            <div class="input-group">
                                <div class="shadow-sm form-outline">
                                    <input type="search"
                                    id="search-applicant-list"
                                    class="form-control"
                                    autocomplete="off"
                                    name="search"
                                    placeholder="Search"
                                    value="{{ request()->has('search') ? request()->input('search') : '' }}"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="infoModal">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                            <h5 class="modal-title text-light"><i class="bi bi-info-circle"></i></h5>
                            <button type="button" class="close border-0 float-start" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-light">
                            <p>By clicking the message button, you can send announcement to all qualified applicants in this table. You can also view who added in each qualifed applicants by hovering the gear icon from Document column.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-1">
            <div class="scroll2 shadow-sm">
                <x-table.table>
                    <thead class="text-center text-dark" id="applicantListHeader">
                        <tr>
                            <x-table.header/>
                        </tr>
                    </thead>
                    <tbody id="applicantListHeader">
                        @forelse ($qualifiedApplicantList as $list)
                            <tr class="tbl-row">
                                <td class="text-center">
                                    <a href="/applicant/evaluation/{{ $list->applicant_lists_id }}" target="_blank">
                                        {{ $list->applicantList->rating->rate }}%
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="fw-bold text-danger" href="{{ $list->document }}"
                                        target="_blank" style="font-size: 22px">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </a>
                                </td>
                                <x-table.td :applicant="$list->applicant->first()"/>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="25">No qualified applicant yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </x-table.table>
            </div>
            <div class="container mt-3">
                {{ $qualifiedApplicantList->links('pagination::bootstrap-5') }}
            </div>
        </x-container>
    </section>
</x-layout>


