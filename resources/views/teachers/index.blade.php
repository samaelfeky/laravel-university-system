<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teachers List</title>
</head>
<body>
    <h1>All Teachers</h1>
    <a href="{{ route('teachers.create') }}">Add New Teacher</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Teacher ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Department ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->Teacher_ID }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->type }}</td>
                    <td>{{ $teacher->Department_ID }}</td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->Teacher_ID) }}">Edit</a> |
                        <form action="{{ route('teachers.destroy', $teacher->Teacher_ID) }}" method="POST" style="display:inline;">
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