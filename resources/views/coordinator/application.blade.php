<x-navbar>
    <section>
        <x-layout>
            <div class="d-flex justify-content-between">
                <h4 class="mt-3">Application</h4>
                <a href="/applications/create" class="btn btn-outline-primary mt-2 mb-3 shadow-sm"
                data-bs-toggle="tooltip" data-bs-placement="left" title="Create Application">
                    <i class="bi bi-file-earmark-plus-fill"></i>
                </a>
            </div>
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Batch</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total Submissions</th>
                        <th scope="col">Applicants</th>
                        <th scope="col">Action</th>
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
            </table>

            <div class="container mt-3">
                {{ $application->links('pagination::bootstrap-5') }}
            </div>
        </x-layout>
    </section>
</x-navbar>
