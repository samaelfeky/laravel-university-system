<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    {{-- @dd($student) --}}
        <h1 class="text-danger text-center"> Student Details</h1>
      <table class="table table-striped table-bordered w-75 m-auto mt-10">
        <thead>
            <th>University ID</th>
            <th>Name</th>
            <th>Street</th>
            <th>City</th>
            <th>Zip</th>
            <th>Action</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $student['University_ID'] }}
                </td>
                <td>
                    {{ $student['name'] }}
                </td>
                <td>
                    {{ $student['street'] }}
                </td>
                <td>
                    {{ $student['city'] }}
                </td>
                <td>
                    {{ $student['zip'] }}
                </td>
                <td class="text-center">
                   <a href="{{ route('students.index') }}"> <button class="btn btn-success">Back</button></a>
                    <button class="btn btn-info">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>