<x-layout title="Submissions">
    <section>
        <x-container class="border shadow-sm">
            <div class="row mt-3">
                <div class="col-lg d-flex">
                    <h4 class="mt-2">Applicant List</h4>
                    <p class="mt-2 ms-3" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#infoModal">
                        <i class="bi bi-info-circle"></i>
                    </p>
                </div>
                <div class="col-lg">
                    <div class="d-flex float-lg-end">
                        <div>
                            <span data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Qualified">
                                <button class="shadow-sm btn btn-outline-success me-2" data-bs-toggle="modal"
                                data-bs-target="#qualifiedApplicant" id="checkBox1" disabled>
                                    <i class="bi bi-person-check-fill"></i>
                                </button>
                            </span>
                        </div>

                        <div>
                            <span data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Rejected">
                                <button class="shadow-sm btn btn-outline-danger me-2" id="checkBox2"
                                disabled data-bs-toggle="modal" data-bs-target="#rejectedApplicant" disabled>
                                    <i class="bi bi-person-x-fill"></i>
                                </button>
                            </span>
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
                                <p>To add applicant as qualified or rejected, check boxes must be selected in order to gain access in buttons. Added applicant as qualified or rejected, it will automatically hidden from the list.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <hr class="mt-1">
            <div class="scroll shadow-sm mt-2">
                <form action="/applicants/{{ $application->id }}" method="POST" id="checkboxForm">
                    @csrf
                    <x-table.table>
                        <thead class="text-dark text-center" id="applicantListHeader">
                            <tr>
                                <x-table.th class="bg-light">
                                    <input type="checkbox" class="mb-1 form-check-input" name="selectAll"
                                    onchange="document.getElementById('checkBox1').disabled = !this.checked;
                                        document.getElementById('checkBox2').disabled = !this.checked;">
                                </x-table.th>
                                <x-table.header/>
                            </tr>
                        </thead>
                        <tbody id="applicantListHeader">
                            @forelse ($applicantList as $list)
                                <tr class="tbl-row">
                                    <td>
                                        <input type="checkbox" name="applicant[]"
                                        value="{{ $list->applicant->first()->id }}"
                                        class="form-check-input mt-1"
                                        onchange="document.getElementById('checkBox1').disabled = !this.checked;
                                        document.getElementById('checkBox2').disabled = !this.checked;">
                                    </td>
                                    <td class="text-center">
                                        <a href="/applicant/evaluation/{{ $list->id }}" target="_blank">
                                        {{ optional($list->rating)->rate }}%
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="fw-bold text-danger" href="/storage/{{ $list->document }}"
                                            target="_blank" style="font-size: 22px">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </a>
                                    </td>
                                    <x-table.td :applicant="$list->applicant->first()"/>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="25">No submissions yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </x-table.table>
                </form>
            </div>

            <div class="container mt-3">
                {{ $applicantList->links('pagination::bootstrap-5') }}
            </div>

            <x-modal name="qualifiedApplicant">
                <x-slot name="header">Qualified Applicant</x-slot>
                <x-slot name="body">Are you sure you want to proceed?</x-slot>
                <x-slot name="footer">
                    <x-form.button type="button" class="btn-outline-danger" data-bs-dismiss="modal">
                        Cancel
                    </x-form.button>
                    <x-form.button type="submit" class="btn-outline-primary"
                    form="checkboxForm" name="action" value="qualified">
                        Confirm
                    </x-form.button>
                </x-slot>
            </x-modal>

            <x-modal name="rejectedApplicant">
                <x-slot name="header">Rejected Applicant</x-slot>
                <x-slot name="body">Are you sure you want to proceed?</x-slot>
                <x-slot name="footer">
                    <x-form.button type="button" class="btn-outline-danger" data-bs-dismiss="modal">
                        Cancel
                    </x-form.button>
                    <x-form.button type="submit" class="btn-outline-primary"
                    form="checkboxForm" name="action" value="rejected">
                        Confirm
                    </x-form.button>
                </x-slot>
            </x-modal>
        </x-container>
    </section>

    <script>
        $(function() {
            jQuery("[name=selectAll]").click(function(source) {
                checkboxes = jQuery("[name='applicant[]'");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>
</x-layout>

