<x-layout>
    <section>
        <x-container>
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h4 class="mt-2">Rejected Applicant</h4>
                </div>
                <table class="table table-striped table-bordered shadow-sm">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Batch</th>
                            <th scope="col">Last Date Modfied</th>
                            <th scope="col">No. Applicants</th>
                            <th scope="col">Applicants</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        if (!$rejectedApplicant->isEmpty()) {
                            $applicationArray = array();

                            foreach ($rejectedApplicant as $rejectedApplicants) {

                                if(!in_array($rejectedApplicants->applications_id, $applicationArray)){
                                $applicationArray[] = $rejectedApplicants->applications_id
                                ?>
                                    <tr>
                                        <td>{{ $rejectedApplicants->application->batch }}</td>
                                        <td>{{ date('F j, Y', strtotime($rejectedApplicants->created_at )). " - " .
                                        date('H:i', strtotime($rejectedApplicants->created_at)) }}
                                        </td>
                                        <td>{{ $rejectedApplicants->where('applications_id', $rejectedApplicants->applications_id)
                                        ->count() }}
                                        </td>
                                        <td>
                                            <a href="/applicants/rejected/list/{{ $rejectedApplicants->applications_id }}"
                                                class="text-decoration-none">View</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                        } else{
                            ?>
                                <tr>
                                    <td colspan="4" class="text-center">No applicants yet</td>
                                </tr>
                            <?php
                        }

                    ?>

                    </tbody>
                </table>
            </div>
            <div class="container mt-3">
                {{ $rejectedApplicant->links('pagination::bootstrap-5') }}
            </div>
        </x-container>
    </section>
</x-layout>
