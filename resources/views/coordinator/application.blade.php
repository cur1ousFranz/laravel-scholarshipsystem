<x-layout>
    <section>
        <x-container>
            <div class="d-flex justify-content-between">
                <h4 class="mt-2">Application</h4>
                <a href="/applications/create" class="btn btn-outline-primary mb-3 shadow-sm"
                data-bs-toggle="tooltip" data-bs-placement="left" title="Create Application">
                    <i class="bi bi-file-earmark-plus-fill"></i>
                </a>
            </div>
            <x-table.table>
                <thead class="text-center">
                    <tr>
                        <x-table.th>Batch</x-table.th>
                        <x-table.th>Start Date</x-table.th>
                        <x-table.th>End Date</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Total Submissions</x-table.th>
                        <x-table.th>Applicants</x-table.th>
                        <x-table.th>Action</x-table.th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if (!$application->isEmpty())
                        @foreach ($application as $applications)
                            <tr>
                                <td>{{ $applications->batch }}</td>
                                <td>{{ date('F j, Y', strtotime($applications->created_at)) }}</td>
                                <td>{{ date('F j, Y', strtotime($applications->end_date)) }}</td>
                                <td class="{{ $applications->status == "On-going" ? "text-success" : "text-danger" }}">
                                    {{ $applications->status }}
                                </td>
                                <td>{{ $applications->applicantList->count() }}
                                </td>
                                <td>
                                    <a class="text-decoration-none" href="/applications/{{ $applications->id }}/submissions">View</a>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="/applications/{{ $applications->id }}/edit" class="btn btn-sm btn-outline-success me-1" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Edit Application">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No applications yet</td>
                        </tr>
                    @endif
                </tbody>
            </x-table.table>

            <div class="container mt-3">
                {{ $application->links('pagination::bootstrap-5') }}
            </div>
        </x-container>
    </section>
</x-layout>
