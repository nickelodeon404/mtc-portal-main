<!DOCTYPE html> <html lang="en"> <head>
<meta charset="UTF-8"> <title>Enrolled Report</title> <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style> body { font-family: 'Arial' , sans-serif; } img { max-width: 100%; height: auto; } h1 { font-family: 'Arial',
    sans-serif; } table { border-collapse: collapse; border: 1px solid; text-align: center; width: 100%; } th, td {
    border: 1px solid; } </style>
    </head>

    <body>
        <img src="{{ public_path('logo.png')}}" alt="Logo">
        <h1>Enrolled Report</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Section</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrolledData as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                    <td>{{ $item->section }}</td>
                    <td>{{ $item->mobile_number }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>