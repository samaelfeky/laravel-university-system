<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Teacher</title>
</head>
<body>
    <h1>Add New Teacher</h1>
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <br>
        <div>
            <label>Type / Academic Rank:</label>
            <input type="text" name="type">
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
        <button type="submit">Save Teacher</button>
        <a href="{{ route('teachers.index') }}">Cancel</a>
    </form>
</body>
</html>