<x-navbar>
    <x-layout>
        <div class="container">
            <div class="d-flex justify-content-between">
                <h4 class="mt-3">Rejected Applicant</h4>
            </div>
            <table class="table table-striped table-bordered">
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

                    $applicationArray = array();

                    foreach ($rejectedApplicant as $rejectedApplicants) {

                        if(!in_array($rejectedApplicants->applications_id, $applicationArray)){
                        $applicationArray[] = $rejectedApplicants->applications_id
                        ?>
                            <tr>
                                <td>{{ $rejectedApplicants->application->batch }}</td>
                                <td>{{ $rejectedApplicants->created_at }}</td>
                                <td>{{ $rejectedApplicants->where('applications_id', $rejectedApplicants->applications_id)
                                ->count() . ' / ' . $rejectedApplicants->application->slots }}
                                </td>
                                <td>
                                    <a href="/applicants/rejected/list/{{ $rejectedApplicants->applications_id }}"
                                        class="text-decoration-none">View</a>
                                </td>
                            </tr>
                        <?php
                        }
                    }

                ?>

                </tbody>
            </table>
        </div>


    </x-layout>
</x-navbar>
