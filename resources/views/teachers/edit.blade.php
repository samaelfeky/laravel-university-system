<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Teacher</title>
</head>
<body>
    <h1>Edit Teacher</h1>
    <form action="{{ route('teachers.update', $teacher->Teacher_ID) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $teacher->name }}" required>
        </div>
        <br>
        <div>
            <label>Type / Academic Rank:</label>
            <input type="text" name="type" value="{{ $teacher->type }}">
        </div>
        <br>
        <div>
            <label>Department ID:</label>
            <input type="number" name="Department_ID" value="{{ $teacher->Department_ID }}">
        </div>
        <br>
        <button type="submit">Update Teacher</button>
        <a href="{{ route('teachers.index') }}">Cancel</a>
    </form>
</body>
</html>