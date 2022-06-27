<x-navbar>
    <x-layout class="h-100">
        <div class="d-flex justify-content-between">
            <h4 class="mt-3">Applicant List</h4>
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
        <div class="scroll border">
            <table class="table table-striped table-bordered">
                <thead class="text-center text-dark" id="applicantListHeader">
                    <tr>
                        <th scope="col" class="bg-primary text-white">Rating</th>
                        <th scope="col" class="bg-primary text-white">Document</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Civil Status</th>

                        <th scope="col">Street</th>
                        <th scope="col">Barangay</th>
                        <th scope="col">City</th>
                        <th scope="col">Province</th>
                        <th scope="col">Region</th>
                        <th scope="col">Zipcode</th>

                        <th scope="col">Contact Number</th>
                        <th scope="col">Contact Email</th>


                        <th scope="col">Desired School</th>
                        <th scope="col">Course</th>
                        <th scope="col">HEI Type</th>
                        <th scope="col">School Last Attended</th>

                        <th scope="col">Nationality</th>
                        <th scope="col">Educational Attainment</th>
                        <th scope="col">No. Years in City</th>
                        <th scope="col">Family Income</th>
                        <th scope="col">Registered Voter</th>
                        <th scope="col">GWA</th>

                    </tr>
                </thead>
                <tbody class="text-center" id="applicantListHeader">
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Franz Jeff</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>General Santos City</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>

                    {{-- @if (!$submission->isEmpty())
                        @foreach ($submission as $submissions)
                            <tr>
                                <td>{{ $submissions->application->status }}</td>
                                <td>{{ $submissions->application->start_date }}</td>
                                <td>{{ $submissions->application->end_date }}</td>
                                <td>{{ $submissions->application->status }}</td>
                                <td>
                                    <a href="/submissions/applicants/{{ $submissions->id }}">View</a>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No submissions yet</td>
                        </tr>
                    @endif --}}
                </tbody>
            </table>
        </div>

    </x-layout>
</x-navbar>
