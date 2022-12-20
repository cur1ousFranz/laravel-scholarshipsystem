<x-layout title="Changes | Edukar Scholarship">
    <section>
        <x-container>
            <div class="container-fluid mb-5">
                <div class="card w-75 mx-auto shadow-sm">
                    <div class="card-body border-top border-top-4 border-bottom border-bottom-4 border-primary">
                        <div class="px-5">
                            <h4 class="mt-2">Family Income Range</h4>
                            @php
                                $range = json_decode($family_incomes->range, true);

                                $bracket2 = explode('-', $range['bracket2']);
                                $bracket3 = explode('-', $range['bracket3']);
                                $bracket4 = explode('-', $range['bracket4']);
                                $bracket5 = explode('-', $range['bracket5']);
                                $bracket6 = explode('-', $range['bracket6']);
                                $bracket7 = explode('-', $range['bracket7']);

                            @endphp
                            <form action="/changes/income" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mt-4">
                                    <div class="col-md-5">
                                        <input class="shadow-sm form-control"style="background-color: #fff;" autocomplete="off" value="Less than" readonly>
                                    </div>
                                    <div class="col-md-2 text-center mt-2">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b1" value="{{ old('b1', number_format($range['bracket1']))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b1"/>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 33px">
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b2_1" value="{{ old('b2_1', number_format($bracket2[0]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b2_1"/>
                                    </div>
                                    <div class="col-md-2 text-center mt-2">
                                        <h6 class="">- TO -</h6>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b2_2" value="{{ old('b2_2', number_format($bracket2[1]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b2_2"/>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 33px">
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b3_1" value="{{ old('b3_1', number_format($bracket3[0]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b3_1"/>
                                    </div>
                                    <div class="col-md-2 text-center mt-2">
                                        <h6 class="">- TO -</h6>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b3_2" value="{{ old('b3_2', number_format($bracket3[1]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b3_2"/>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 33px">
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b4_1" value="{{ old('b4_1', number_format($bracket4[0]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b4_1"/>
                                    </div>
                                    <div class="col-md-2 text-center mt-2">
                                        <h6 class="">- TO -</h6>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b4_2" value="{{ old('b4_2', number_format($bracket4[1]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b4_2"/>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 33px">
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b5_1" value="{{ old('b5_1', number_format($bracket5[0]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b5_1"/>
                                    </div>
                                    <div class="col-md-2 text-center mt-2">
                                        <h6 class="">- TO -</h6>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b5_2" value="{{ old('b5_2', number_format($bracket5[1]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b5_2"/>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 33px">
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b6_1" value="{{ old('b6_1', number_format($bracket6[0]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b6_1"/>
                                    </div>
                                    <div class="col-md-2 text-center mt-2">
                                        <h6 class="">- TO -</h6>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b6_2" value="{{ old('b6_2', number_format($bracket6[1]))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b6_2"/>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 33px">
                                    <div class="col-md-5">
                                        <div class="d-flex px-2 border shadow-sm align-items-center">
                                            <span class="text-lg">₱</span>
                                            <input class="form-control border-0 px-2 shadow-none"style="background-color: #fff;" autocomplete="off" name="b7" value="{{ old('b7', number_format($range['bracket7']))}}"
                                            onkeypress="return /[0-9,]/i.test(event.key)" maxlength="10">
                                        </div>
                                        <x-form.error name="b7"/>
                                    </div>
                                    <div class="col-md-2 text-center mt-2">
                                    </div>
                                    <div class="col-md-5">
                                        <input class="shadow-sm form-control"style="background-color: #fff;" autocomplete="off" value="and above" readonly>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-outline-primary float-end">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card w-75 mx-auto mt-4 shadow-sm">
                    <div class="card-body border-top border-top-4 border-bottom border-bottom-4 border-primary">
                        <div class="px-5">
                            <h4 class="mt-2">School and Courses</h4>
                            <form action="/changes/course" method="POST" id="addCourseForm">
                                @csrf
                                <div class="row" style="margin-top: 33px">
                                    <div class="col-md-6">
                                        <x-form.label class="mt-3" name="school_name"/>
                                        <select class="shadow-sm form-select form-control" name="school_name" id="school_name" >
                                            <option selected disabled>Select School</option>
                                            @foreach ($school_list as $school)
                                                <option value="{{ $school->school }}" {{ old('school_name') === $school->school ? 'selected' : '' }}>
                                                    {{ $school->school }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-form.error name="school_name"/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.label class="mt-3" name="course_name"/>
                                        <input class="form-control px-2"style="background-color: #fff;" autocomplete="off" name="course_name" value="{{ old('course_name') }}" id="course_name" >
                                        <x-form.error name="course_name"/>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#addCourse" class="w-10 btn btn-outline-primary float-end" id="addBtn" disabled>
                                            ADD
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <x-modal name="addCourse">
                                <x-slot name="header">Add Course</x-slot>
                                <x-slot name="body">
                                    <p id="message"></p>
                                </x-slot>
                                <x-slot name="footer">
                                    <x-form.button type="button" class="btn-outline-danger" data-bs-dismiss="modal">
                                        Cancel
                                    </x-form.button>
                                    <x-form.button type="submit" class="btn-outline-primary"
                                    form="addCourseForm">
                                        Confirm
                                    </x-form.button>
                                </x-slot>
                            </x-modal>

                            <hr class="mt-3">
                            <h5 class="mt-3">Current School and Courses List</h5>
                            <x-form.label class="mt-3" name="Schools"/>
                            <select class="shadow-sm form-select form-control dynamic" name="desired_school"
                                id="school" data-dependent="course">
                                <option selected disabled>Select School</option>
                                @foreach ($school_list as $schools)
                                    <option value="{{ $schools->school }}">
                                        {{ $schools->school }}</option>
                                @endforeach
                            </select>
                            <x-form.label class="mt-4" name="Courses"/>
                            <select class="shadow-sm form-select form-control" name="course_name"
                                id="course">
                                <option selected disabled>Select</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
</x-layout>

<script>

    // This is for School and Courses function
    // dynamic dependent dropdown
    $(document).ready(function() {

        $('.dynamic').change(function() {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('dynamicdropdowncontroller.fetch') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function(result) {
                        $('#' + dependent).html(result);
                    }

                })
            }
        });

        $('#school').change(function() {
            $('#course').val('');
        });

    });

    let school_name = ''
    let course_name = ''
    document.querySelector('#school_name').addEventListener('change', (e) => {
        let element = document.querySelector('#school_name')
        school_name = element.value
        enableSubmit()
    })
    document.querySelector('#course_name').addEventListener('change', (e) => {
        let element = document.querySelector('#course_name')
        course_name = element.value
        enableSubmit()
    })

    const enableSubmit = () => {
        if(school_name && course_name){
            document.querySelector('#addBtn').disabled = false
            document.querySelector('#message').innerHTML = `Are you sure you want to add <br> ${course_name} to <br> ${school_name}?`
        }else{
            document.querySelector('#addBtn').disabled = true
        }
    }

</script>

