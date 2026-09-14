<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-primary text-center mb-4">Edit Course</h2>
        <form action="{{ route('courses.update', $course->Course_ID) }}" method="POST" class="w-50 m-auto border p-4 shadow-sm rounded">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Course Name</label>
                <input type="text" name="Course_Name" class="form-control" value="{{ $course->Course_Name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Course Fee</label>
                <input type="number" step="0.01" name="Course_Fee" class="form-control" value="{{ $course->Course_Fee }}" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Update Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
        </form>
    </div>
</body>
</html>