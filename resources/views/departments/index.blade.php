<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Departments List</title>
</head>
<body>
    <h1>All Departments</h1>
    <a href="{{ route('departments.create') }}">Add New Department</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Department ID</th>
                <th>Department Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->Department_ID }}</td>
                    <td>{{ $department->Department_Name }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->Department_ID) }}">Edit</a> |
                        <form action="{{ route('departments.destroy', $department->Department_ID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>