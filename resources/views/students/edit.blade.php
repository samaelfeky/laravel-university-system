<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student Details</h1>
    <form action="{{ route('students.update', $student->University_ID) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $student->name }}" required>
        </div>
        <br>
        <div>
            <label>Street:</label>
            <input type="text" name="street" value="{{ $student->street }}">
        </div>
        <br>
        <div>
            <label>City:</label>
            <input type="text" name="city" value="{{ $student->city }}">
        </div>
        <br>
        <div>
            <label>ZIP Code:</label>
            <input type="text" name="zip" value="{{ $student->zip }}">
        </div>
        <br>
        <div>
            <label>Department ID:</label>
            <input type="number" name="Department_ID" value="{{ $student->Department_ID }}">
        </div>
        <br>
        <button type="submit">Update Student</button>
        <a href="{{ route('students.index') }}">Cancel</a>
    </form>
</body>
</html>