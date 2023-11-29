@extends('layouts.dashboard')

@section('content')
    @include('faculty._sidenav')
    <x-panel>
        <main>
            <x-flash-message></x-flash-message>
            <div class="container-fluid px-4 mt-4">
                <h1>Grading Sheet in {{ $actSubject->name }}</h1>
                <div class="create-card mt-5">
                    <div class="card-body">
                        {{-- <form action="{{ url('grade') }}" method="post"> --}}
                        {{-- {!! csrf_field() !!} --}}
                        <form action="{{ route('faculty.grade.subject', ['subject' => $actSubject->id]) }}">
                            <div class="row mb-3">

                                <div class="col-md-3">
                                    <label for="year" class="form-label"><b>Year</b></label>
                                    <select name="year" id="year" class="form-control">
                                        <option value="" selected>All</option>
                                        <!-- Add your year options here -->
                                        <option value="11" {{ request('year') == 11 ? 'selected' : '' }}>Grade 11
                                        </option>
                                        <option value="12" {{ request('year') == 12 ? 'selected' : '' }}>Grade 12
                                        </option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="strand" class="form-label">* Preferred Strand</label>
                                    <select class="form-select" name="strand" id="strand">
                                        <option value="" selected>All</option>
                                        <option value="ABM" {{ request('strand') == 'ABM' ? 'selected' : '' }}>Accountancy Business & Management</option>
                                        <option value="GAS" {{ request('strand') == 'GAS' ? 'selected' : '' }}>General Academic Strand</option>
                                        <option value="HUMSS" {{ request('strand') == 'HUMSS' ? 'selected' : '' }}>Humanities & Social Sciences</option>
                                        <option value="STEM" {{ request('strand') == 'STEM' ? 'selected' : '' }}>Science, Technology, Engineering & Mathematics</option>
                                        <option value="TVL-ICT" {{ request('strand') == 'TVL-ICT' ? 'selected' : '' }}>Information and Communications Technology</option>
                                        <option value="TVL-HE" {{ request('strand') == 'TVL-HE' ? 'selected' : '' }}>Home Economics</option>
                                        <option value="ARTS & DESIGN" {{ request('strand') == 'ARTS & DESIGN' ? 'selected' : '' }}>Arts & Design</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="section" class="form-label"><b>Section</b></label>
                                    <select name="section" id="section" class="form-control">
                                        <option value="" selected>All</option>
                                        <!-- Add your section options here -->
                                        @foreach ($sections as $section)
                                            <option value="{{ $section }}"
                                                {{ request('section') == $section ? 'selected' : '' }}>{{ $section }}
                                            </option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <!-- Add some margin and padding to align the button with the dropdown -->
                                    <div style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-primary btn-block mt-2"> <i
                                                class="fa-solid fa-filter"></i> Filter Students
                                        </button>
                                    
                                       <!-- <button class="btn btn-success btn-block mt-2">Export
                                            <a href="{{route('export_user_pdf')}}" style="margin-top: 30px; margin-right: auto;"></a>
                                        </button> -->
                                    </div>
                                </div>

                            </div>

                        </form>
                        {{-- Add the filtering logic here --}}
                        @php
                            $selectedYear = request('year');
                            $selectedStrand = request('strand');
                            $selectedSection = request('section');

                            $studentsQuery = \App\Models\Enrolled::query();

                            if ($selectedYear) {
                                $studentsQuery->where('grade_level', $selectedYear);
                            }

                            if ($selectedStrand) {
                                $studentsQuery->where('strand', $selectedStrand);
                            }

                            if ($selectedSection) {
                                $studentsQuery->where('section', $selectedSection);
                            }

                            $students = $studentsQuery->get();
                        @endphp
                        {{-- End of filtering logic --}}
                        <form action="{{ route('faculty.grade.post') }}" method="POST">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>LRN or Student ID</th>
                                        <th>Name</th>
                                        <th>Strand</th>
                                        <th>Year</th>
                                        <th>Section</th>

                                        <th>Final Grade</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="subjectLoads_id[]"
                                                    value="{{ $student->subjectLoad }}">
                                                <input type="text" name="student_id[]" class="form-control" disabled
                                                    readonly value="{{ $student->lrn }}"> 
                                            </td>
                                            <td>
                                                <input type="text" name="name[]" class="form-control" disabled
                                                    value="{{ $student->first_name }} {{ $student->last_name }}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="strand[]" class="form-control" disabled
                                                    value="{{ $student->strand }}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="year[]" class="form-control" disabled
                                                    value="{{ $student->grade_level }}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="section[]" class="form-control" disabled
                                                    value="{{ $student->section ?? 'Unknown' }}" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="final_grade[]" onchange="updateRemarks(this)"
                                                    class="form-control"
                                                    value="{{ old('final_grade')[$loop->index] ?? (\App\Models\Grade::where('subjectLoads_id', $student->subjectLoad)->first()->grade ?? '') }}"
                                                    required>
                                            </td>
                                            <td>
                                                <input type="text" name="remarks[]" class="form-control" readonly>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="">

                                    <a href="{{ url('/grade') }}" style="text-decoration: none;">
                                        <button type="button" class="btn btn-danger"
                                            style="margin-left: 20px;">Cancel</button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">Post</button>
                                </div>
                            </div>
                        </form>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>

    <style>
        /* Set background color for the entire page */
        body {
            background-color: #f0f0f0;
            /* Adjust the color as needed */
        }
    </style>
    <script>
        function updateRemarks(final_grade) {
            const finalGradeInput = final_grade;
            const remarksInput = finalGradeInput.closest('tr').querySelector('input[name="remarks[]"]');
            const finalGrade = finalGradeInput.value;
            let remarks = '';

            if (finalGrade >= 75) {
                remarks = 'Passed';
            } else{
                remarks = 'Failed';
            } 
            remarksInput.value = remarks;
        }
        document.addEventListener('DOMContentLoaded', function() {
            const finalGradeInputs = document.querySelectorAll('input[name="final_grade[]"]');
            finalGradeInputs.forEach(function(input) {
                updateRemarks(input);
            });
        });
    </script>
@endsection
