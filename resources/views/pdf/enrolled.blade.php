<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrolled Report</title>
</head>
<body>
    <h1>Enrolled Report</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>LRN</th>
                <th>Strand</th>
                <th>Year Level</th>
                <th>Section</th>
                <th>Email</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrolledData as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->lrn }}</td>
                    <td>{{ $item->strand }}</td>
                    <td>{{ $item->grade_level }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->middle_name }}</td>
                    <td>{{ $item->extension }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
