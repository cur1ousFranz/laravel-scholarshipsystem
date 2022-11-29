<x-layout title="Rejected Applicant | Edukar Scholarship">
    <section>
        <x-container class="border shadow-sm">
            <div class="container mt-2">
                <div class="d-flex justify-content-between">
                    <h4 class="mt-2">Rejected Applicant</h4>
                </div>
                <x-table.table class="mt-2">
                    <thead class="text-center">
                        <tr>
                            <x-table.th>Batch</x-table.th>
                            <x-table.th>Time Updated</x-table.th>
                            <x-table.th>No. Applicants</x-table.th>
                            <x-table.th>Applicants</x-table.th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($rejectedApplicant as $list)
                            @if (!in_array($list->applications_id, $applicationArray))
                                @php
                                    $applicationArray[] = $list->applications_id
                                @endphp
                                <tr>
                                    <td>{{ $list->application->batch }}</td>
                                    <td>{{ $list->where('applications_id', $list->applications_id)
                                        ->latest('updated_at')->first()->updated_at->diffForHumans() }}
                                    </td>
                                    <td>{{ $list->where('applications_id', $list->applications_id)
                                    ->count() }}
                                    </td>
                                    <td>
                                        <a href="/rejected/{{ $list->applications_id }}"
                                            class="text-decoration-none">View</a>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No applicants yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </x-table.table>
            </div>
            {{-- <div class="container mt-3">
                {{ $rejectedApplicant->links('pagination::bootstrap-5') }}
            </div> --}}
        </x-container>
    </section>
</x-layout>
