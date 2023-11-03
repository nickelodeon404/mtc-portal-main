<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrolled Report</title>
</head>
<body>
    <h1>Enrolled Report</h1>
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
                    readonly value="{{ $student->id }}"> 
            </td>
            <td>
                <input type="text" name="name[]" class="form-control" disabled
                    value="{{ $student->name }}" readonly>
            </td>
            <td>
                <input type="text" name="strand[]" class="form-control" disabled
                    value="{{ $student->strand }}" readonly>
            </td>
            <td>
                <input type="text" name="year[]" class="form-control" disabled
                    value="{{ $student->year_level }}" readonly>
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
</body>
</html>