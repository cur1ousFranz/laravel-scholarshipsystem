<x-layout title="Qualifed Applicant">
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
                            <x-table.th>Time Updated</x-table.th>
                            <x-table.th>No. Applicants</x-table.th>
                            <x-table.th>Applicants</x-table.th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($qualifiedApplicant as $list)
                            @if (!in_array($list->applications_id, $applicationArray))
                                @php
                                    $applicationArray[] = $list->applications_id
                                @endphp
                                <tr>
                                    <td>{{ $list->application->batch }}</td>
                                    <td class="{{ $list->application->status == "On-going" ? 'text-success' : 'text-danger'}}">
                                        {{ $list->application->status }}
                                    </td>
                                    <td>{{ $list->select('created_at')->latest()->first()->created_at->diffForHumans() }}
                                    </td>
                                    <td>{{ $list->application->count() . ' / ' . $list->application->slots }}
                                    </td>
                                    <td>
                                        <a href="/qualified/{{ $list->applications_id }}"
                                            class="text-decoration-none">View</a>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No applicants yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </x-table.table>
            </div>
            {{-- <div class="container mt-3">
                {{ $qualifiedApplicant->links('pagination::bootstrap-5') }}
            </div> --}}
        </x-container>
    </section>
</x-layout>
