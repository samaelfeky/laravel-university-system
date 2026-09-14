<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Department</title>
</head>
<body>
    <h1>Add New Department</h1>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div>
            <label>Department Name:</label>
            <input type="text" name="Department_Name" required>
        </div>
        <br>
        <button type="submit">Save Department</button>
        <a href="{{ route('departments.index') }}">Cancel</a>
    </form>
</body>
</html>