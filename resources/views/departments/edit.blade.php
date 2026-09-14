<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
</head>
<body>
    <h1>Edit Department</h1>
    <form action="{{ route('departments.update', $department->Department_ID) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Department Name:</label>
            <input type="text" name="Department_Name" value="{{ $department->Department_Name }}" required>
        </div>
        <br>
        <button type="submit">Update Department</button>
        <a href="{{ route('departments.index') }}">Cancel</a>
    </form>
</body>
</html>