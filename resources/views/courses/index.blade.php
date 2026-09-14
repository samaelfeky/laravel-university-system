<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-danger text-center mb-4">All Courses</h1>
        <div class="w-75 m-auto mb-3 text-end">
            <a href="{{ route('courses.create') }}" class="btn btn-success">+ Add New Course</a>
        </div>
        <table class="table table-striped table-bordered w-75 m-auto">
            <thead class="table-dark text-center">
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->Course_ID }}</td>
                    <td>{{ $course->Course_Name }}</td>
                    <td>${{ $course->Course_Fee }}</td>
                    <td class="text-center">
                        <a href="{{ route('courses.show', $course->Course_ID) }}" class="btn btn-warning btn-sm">View</a>
                        <a href="{{ route('courses.edit', $course->Course_ID) }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ route('courses.destroy', $course->Course_ID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this course?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>