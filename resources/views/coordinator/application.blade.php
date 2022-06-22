<x-navbar>
    <x-layout>
            <div class="d-flex justify-content-between">
                <h4 class="mt-3">Application</h4>
                <a href="/application/create" class="btn btn-outline-primary mt-2 mb-3">Create Application</a>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Slots</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if (!$student->isEmpty())
                        @foreach ($student as $students)
                            <tr>
                                <td>{{ $students->student_no }}</td>
                                <td>{{ $students->firstname }}</td>
                                <td>{{ $students->middlename }}</td>
                                <td>{{ $students->lastname }}</td>
                                <td>{{ $students->age }}</td>
                                <td>{{ $students->gender }}</td>
                                <td>{{ $students->course }}</td>
                                <td>{{ $students->subject_count }}</td>
                                <td>
                                    <button class="btn btn-outline-success"><span><i class="bi bi-pencil-square"></i></span></button>
                                    <button class="btn btn-outline-danger"><span><i class="bi bi-trash3-fill"></i></span></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No students yet</td>
                        </tr>
                    @endif --}}
                </tbody>
            </table>

        {{-- <div class="container mt-3">
            {{ $student->links('pagination::bootstrap-5') }}
        </div> --}}

    </x-layout>
</x-navbar>
