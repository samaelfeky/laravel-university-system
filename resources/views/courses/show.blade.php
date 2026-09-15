<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Course Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Course Details
        </h1>

        <div>

            <a
                href="{{ route('courses.index') }}"
                class="btn btn-secondary"
            >
                Back to Courses
            </a>

            <a
                href="{{ route('courses.edit', $course->Course_ID) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

        </div>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Course Information --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-dark text-white">

            <h4 class="mb-0">
                Course Information
            </h4>

        </div>


        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <strong>
                        Course ID:
                    </strong>

                    <div>
                        {{ $course->Course_ID }}
                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <strong>
                        Course Name:
                    </strong>

                    <div>
                        {{ $course->Course_Name }}
                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <strong>
                        Course Fee:
                    </strong>

                    <div>
                        {{ $course->Course_Fee ?? 'N/A' }}
                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <strong>
                        Department:
                    </strong>

                    <div>
                        {{ $course->department?->Department_Name ?? 'No Department' }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Teachers --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                Teachers
            </h4>

        </div>


        <div class="card-body">

            @if($course->teachers->count() > 0)

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>
                                    Teacher ID
                                </th>

                                <th>
                                    Name
                                </th>

                                <th>
                                    Department
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($course->teachers as $teacher)

                                <tr>

                                    <td>
                                        {{ $teacher->Teacher_ID }}
                                    </td>

                                    <td>
                                        {{ $teacher->name }}
                                    </td>

                                    <td>
                                        {{ $teacher->department?->Department_Name ?? 'No Department' }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="alert alert-info mb-0">

                    No teachers assigned to this course.

                </div>

            @endif

        </div>

    </div>


    {{-- Students --}}

    <div class="card shadow-sm">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">
                Students
            </h4>

        </div>


        <div class="card-body">

            @if($course->students->count() > 0)

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>
                                    University ID
                                </th>

                                <th>
                                    Name
                                </th>

                                <th>
                                    Department
                                </th>

                                <th>
                                    Semester
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($course->students as $student)

                                <tr>

                                    <td>
                                        {{ $student->University_ID }}
                                    </td>

                                    <td>
                                        {{ $student->name }}
                                    </td>

                                    <td>
                                        {{ $student->department?->Department_Name ?? 'No Department' }}
                                    </td>

                                    <td>
                                        {{ $student->pivot->Semester ?? 'N/A' }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="alert alert-info mb-0">

                    No students enrolled in this course.

                </div>

            @endif

        </div>

    </div>

</div>

</body>

</html>