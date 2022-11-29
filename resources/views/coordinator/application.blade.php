<x-layout title="Application | Edukar Scholarship">
    <section>
        <x-container class="border shadow-sm">
            <div class="d-flex justify-content-between mt-3">
                <h4 class="mt-2">Application</h4>
                <a href="/applications/create" class="btn btn-primary mb-3 shadow-sm"
                data-bs-toggle="tooltip" data-bs-placement="left" title="Create Application">
                    Create Application
                </a>
            </div>
            <hr class="mt-0">
            <x-table.table>
                <thead class="text-center">
                    <tr>
                        <x-table.th>Batch</x-table.th>
                        <x-table.th>Start Date</x-table.th>
                        <x-table.th>End Date</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Total Submissions</x-table.th>
                        <x-table.th>Applicants</x-table.th>
                        <x-table.th></x-table.th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($applications as $application)
                        <tr>
                            <td>{{ $application->batch }}</td>
                            <td>{{ date('F j, Y', strtotime($application->start_date)) }}</td>
                            <td>{{ date('F j, Y', strtotime($application->end_date)) }}</td>
                            <td class="{{ $application->status == "On-going" ? "text-success" : "text-danger" }}">
                                {{ $application->status }}
                            </td>
                            <td>{{ $application->applicantList->count() }}
                            </td>
                            <td>
                                <a class="text-decoration-none" href="/applications/{{ $application->id }}/submissions">View</a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="/applications/{{ $application->id }}/edit" class="btn btn-sm btn-outline-success me-1" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Edit Application">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No applications yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table.table>

            <div class="container mt-3">
                {{ $applications->links('pagination::bootstrap-5') }}
            </div>
        </x-container>
    </section>
</x-layout>
