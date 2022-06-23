<x-navbar>
    <x-layout>
        <div class="d-flex justify-content-between">
            <h4 class="mt-3">Submission</h4>
            <form action="">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" />
                    </div>
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No. of Submissions</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Applicants</th>
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
    </x-layout>
</x-navbar>
