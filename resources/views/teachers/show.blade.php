<!DOCTYPE html>
<html>
<head>
    <title>Teacher Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 35px;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background: #f5f5f5;
        }

        .section {
            width: 90%;
            margin: 30px auto;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .blue {
            background: #00b7e9;
        }

        .red {
            background: #ef4444;
        }

        .gray {
            background: #777;
        }

        form {
            display: inline;
        }

        input,
        select {
            padding: 8px;
            margin: 5px;
        }

        .info td:first-child {
            font-weight: bold;
            width: 200px;
        }

        .add-box {
            width: 90%;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

<h1>Teacher Details</h1>

<div class="section">

    <table class="info">

        <tr>
            <td>Teacher ID</td>
            <td>{{ $teacher->Teacher_ID }}</td>
        </tr>

        <tr>
            <td>Name</td>
            <td>{{ $teacher->name }}</td>
        </tr>

        <tr>
            <td>Type</td>
            <td>{{ $teacher->type ?? 'N/A' }}</td>
        </tr>

        <tr>
            <td>Department</td>
            <td>
                {{ $teacher->department?->Department_Name ?? 'No Department' }}
            </td>
        </tr>

    </table>

</div>

<div class="section">

    <h2>Teacher Courses</h2>

    <table>

        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Students</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse ($teacher->courses as $course)

            <tr>

                <td>{{ $course->Course_ID }}</td>

                <td>{{ $course->Course_Name }}</td>

                <td>

                    @forelse ($course->students as $student)

                        {{ $student->name }}

                        @if (!$loop->last)
                            ,
                        @endif

                    @empty

                        No Students

                    @endforelse

                </td>

                <td>

                    <form
                        action="{{ route(
                            'teachers.courses.remove',
                            [
                                'teacher' => $teacher->Teacher_ID,
                                'course' => $course->Course_ID
                            ]
                        ) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button class="btn red">
                            Remove
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4">
                    No Courses Found
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

<div class="add-box">

    <h2>Add Course</h2>

    <form
        action="{{ route(
            'teachers.courses.add',
            $teacher->Teacher_ID
        ) }}"
        method="POST"
    >

        @csrf

        <select name="Course_ID" required>

            <option value="">
                Select Course
            </option>

            @foreach ($availableCourses as $course)

                <option value="{{ $course->Course_ID }}">
                    {{ $course->Course_Name }}
                </option>

            @endforeach

        </select>

        <button class="btn blue">
            Add Course
        </button>

    </form>

</div>

<div class="section">

    <a
        href="{{ route('teachers.index') }}"
        class="btn gray"
    >
        Back
    </a>

    <a
        href="{{ route(
            'teachers.edit',
            $teacher->Teacher_ID
        ) }}"
        class="btn blue"
    >
        Edit
    </a>

    <form
        action="{{ route(
            'teachers.destroy',
            $teacher->Teacher_ID
        ) }}"
        method="POST"
    >

        @csrf
        @method('DELETE')

        <button class="btn red">
            Delete
        </button>

    </form>

</div>

</body>
</html>