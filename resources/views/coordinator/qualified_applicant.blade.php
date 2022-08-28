<x-layout>
    <section>
        <x-container>
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h4 class="mt-2">Qualified Applicant</h4>
                </div>
                <table class="table table-striped table-bordered shadow-sm">
                    <thead class="text-center">
                        <tr>
                            <th class="fw-normal">Batch</th>
                            <th class="fw-normal">Status</th>
                            <th class="fw-normal">Last Date Modfied</th>
                            <th class="fw-normal">No. Applicants</th>
                            <th class="fw-normal">Applicants</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        if (!$qualifiedApplicant->isEmpty()) {

                            $applicationArray = array();

                            foreach ($qualifiedApplicant as $qualifiedApplicants) {

                                if(!in_array($qualifiedApplicants->applications_id, $applicationArray)){
                                $applicationArray[] = $qualifiedApplicants->applications_id
                                ?>
                                    <tr>
                                        <td>{{ $qualifiedApplicants->application->batch }}</td>
                                        <td class="{{ $qualifiedApplicants->application->status == "On-going" ? 'text-success' : 'text-danger'}}">
                                            {{ $qualifiedApplicants->application->status }}
                                        </td>
                                        <td>{{ date('F j, Y', strtotime($qualifiedApplicants->created_at )). " - " .
                                            date('H:i', strtotime($qualifiedApplicants->created_at)) }}</td>
                                        <td>{{ $qualifiedApplicants->where('applications_id', $qualifiedApplicants->applications_id)
                                        ->count() . ' / ' . $qualifiedApplicants->application->slots }}
                                        </td>
                                        <td>
                                            <a href="/applicants/qualified/list/{{ $qualifiedApplicants->applications_id }}"
                                                class="text-decoration-none">View</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="5" class="text-center">No applicants yet</td>
                                </tr>
                            <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="container mt-3">
                {{ $qualifiedApplicant->links('pagination::bootstrap-5') }}
            </div>
        </x-container>
    </section>
</x-layout>
