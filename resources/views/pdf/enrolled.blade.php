<!DOCTYPE html> <html lang="en"> <head>
<meta charset="UTF-8"> <title>Enrolled Report</title> </head>
<body style="font-family: 'Arial', sans-serif; "> <h1 style="font-family: 'Arial', sans-serif;">Enrolled Report</h1> <table style="border-collapse: collapse; border: 1px solid; text-align: center">
    <thead >
    <tr>
    <th style="border: 1px solid;">#</th>
    <th style="border: 1px solid;">LRN</th>
    <th style="border: 1px solid;">Strand</th>
    <th style="border: 1px solid;">Year Level</th>
    <th style="border: 1px solid;">Section</th>
    <th style="border: 1px solid;">Email</th>
    <th style="border: 1px solid;">Last Name</th>
    <th style="border: 1px solid;">First Name</th>
    <th style="border: 1px solid;">Middle Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($enrolledData as $item)
    <tr>
    <td style="border: 1px solid;">{{ $loop->iteration }}</td>
    <td style="border: 1px solid;">{{ $item->lrn }}</td>
    <td style="border: 1px solid;">{{ $item->strand }}</td>
    <td style="border: 1px solid;">{{ $item->grade_level }}</td>
    <td style="border: 1px solid;">{{ $item->section }}</td> <!-- Assuming section is the correct field name -->
    <td style="border: 1px solid;">{{ $item->email }}</td>
    <td style="border: 1px solid;">{{ $item->last_name }}</td>
    <td style="border: 1px solid;">{{ $item->first_name }}</td>
    <td style="border: 1px solid;">{{ $item->middle_name }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </body>

    </html>