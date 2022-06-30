<x-navbar>
    <x-layout>
        <div class="container">
            <div class="d-flex justify-content-between">
                <h4 class="mt-3">Qualified Applicant</h4>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Batch</th>
                        <th scope="col">Status</th>
                        <th scope="col">Last Date Modfied</th>
                        <th scope="col">No. Applicants</th>
                        <th scope="col">Applicants</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php

                        $applicationArray = array();

                        foreach ($qualifiedApplicant as $qualifiedApplicants) {

                            if(!in_array($qualifiedApplicants->applications_id, $applicationArray)){
                            $applicationArray[] = $qualifiedApplicants->applications_id
                            ?>
                    <tr>
                        <td>{{ $qualifiedApplicants->applicants_id }}</td>
                        <td>{{ $qualifiedApplicants->application->status }}</td>
                        <td>{{ $qualifiedApplicants->created_at }}</td>
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

                    ?>
                </tbody>
            </table>
        </div>


    </x-layout>
</x-navbar>
