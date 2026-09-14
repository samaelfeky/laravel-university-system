<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Student</title>
</head>
<body>
    <h1>Add New Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div>
            <label>University ID:</label>
            <input type="text" name="University_ID" required>
        </div>
        <br>
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <br>
        <div>
            <label>Street:</label>
            <input type="text" name="street">
        </div>
        <br>
        <div>
            <label>City:</label>
            <input type="text" name="city">
        </div>
        <br>
        <div>
            <label>ZIP Code:</label>
            <input type="text" name="zip">
        </div>
        <br>
        <div>
            <label>Department ID:</label>
            <input type="number" name="Department_ID">
        </div>
        <br>
        <div>
            <label>User ID:</label>
            <input type="number" name="user_id">
        </div>
        <br>
        <button type="submit">Save Student</button>
        <a href="{{ route('students.index') }}">Cancel</a>
    </form>
</body>
</html>