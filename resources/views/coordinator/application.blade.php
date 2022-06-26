<x-navbar>
    <x-layout>
        <div class="d-flex justify-content-between">
            <h4 class="mt-3">Application</h4>
            <a href="/applications/create" class="btn btn-outline-primary mt-2 mb-3">Create Application</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <tr>
                    <th scope="col">Slots</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    if (!$application->isEmpty()) {
                        foreach ($application as $applications){
                        ?>
                            <tr>
                                <td>{{ $applications->slots }}</td>
                                <td>{{ $applications->start_date }}</td>
                                <td>{{ $applications->end_date }}</td>
                                <td class="text-success">{{ $applications->status }}</td>
                                <td>
                                    <a href="/applications/{{ $applications->id }}/edit">View</a> {{-- TODOOOOOO! --}}
                                </td>
                            </tr>
                        <?php


                        }

                    }else {
                        ?>  <tr>
                                <td colspan="8" class="text-center">No applications yet</td>
                            </tr>
                    <?php
                    }

                ?>
                {{-- @if (!$application->isEmpty())
                    @foreach ($application as $applications) --}}
                        {{-- <tr>
                            <td>{{ $applications->slots }}</td>
                            <td>{{ $applications->start_date }}</td>
                            <td>{{ $applications->end_date }}</td>
                            <td class="text-success">{{ $applications->status }}</td>
                            <td> --}}
                                {{-- <a href="/applications/{{ $applications->id }}/edit">View</a> TODOOOOOO! --}}
                            {{-- </td>
                        </tr> --}}
                    {{-- @endforeach
                @else --}}
                    {{-- <tr>
                        <td colspan="8" class="text-center">No applications yet</td>
                    </tr> --}}
                {{-- @endif --}}
            </tbody>
        </table>

        {{-- <div class="container mt-3">
            {{ $student->links('pagination::bootstrap-5') }}
        </div> --}}

    </x-layout>
</x-navbar>
