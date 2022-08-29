<x-layout>
    <section>
        <x-container>
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h4 class="mt-2">Qualified Applicant</h4>
                </div>
                <x-table.table>
                    <thead class="text-center">
                        <tr>
                            <x-table.th>Batch</x-table.th>
                            <x-table.th>Status</x-table.th>
                            <x-table.th>Last Date Modfied</x-table.th>
                            <x-table.th>No. Applicants</x-table.th>
                            <x-table.th>Applicants</x-table.th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if (!$qualifiedApplicant->isEmpty())
                            @foreach ($qualifiedApplicant as $qualifiedApplicants)
                                @if (!in_array($qualifiedApplicants->applications_id, $applicationArray))
                                    @php
                                        $applicationArray[] = $qualifiedApplicants->applications_id
                                    @endphp
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
                                            <a href="/applicants/qualified/{{ $qualifiedApplicants->applications_id }}"
                                                class="text-decoration-none">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No applicants yet</td>
                            </tr>
                        @endif
                    </tbody>
                </x-table.table>
            </div>
            <div class="container mt-3">
                {{ $qualifiedApplicant->links('pagination::bootstrap-5') }}
            </div>
        </x-container>
    </section>
</x-layout>
