<x-layout>
    <section>
        <x-container>
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h4 class="mt-2">Rejected Applicant</h4>
                </div>
                <x-table.table>
                    <thead class="text-center">
                        <tr>
                            <x-table.th>Batch</x-table.th>
                            <x-table.th>Last Date Modfied</x-table.th>
                            <x-table.th>No. Applicants</x-table.th>
                            <x-table.th>Applicants</x-table.th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if (!$rejectedApplicant->isEmpty())
                            @foreach ($rejectedApplicant as $list)
                                @if (!in_array($list->applications_id, $applicationArray))
                                    @php
                                        $applicationArray[] = $list->applications_id
                                    @endphp
                                    <tr>
                                        <td>{{ $list->application->batch }}</td>
                                        <td>{{ date('F j, Y', strtotime($list->created_at )). " - " .
                                        date('H:i', strtotime($list->created_at)) }}
                                        </td>
                                        <td>{{ $list->where('applications_id', $list->applications_id)
                                        ->count() }}
                                        </td>
                                        <td>
                                            <a href="/applicants/rejected/{{ $list->applications_id }}"
                                                class="text-decoration-none">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No applicants yet</td>
                            </tr>
                        @endif
                    </tbody>
                </x-table.table>
            </div>
            <div class="container mt-3">
                {{ $rejectedApplicant->links('pagination::bootstrap-5') }}
            </div>
        </x-container>
    </section>
</x-layout>
