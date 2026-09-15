<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Department Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container py-5">

    {{-- Page Header --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Department Details
        </h1>

        <div>

            <a
                href="{{ route('departments.index') }}"
                class="btn btn-secondary"
            >
                Back to Departments
            </a>

            <a
                href="{{ route('departments.edit', $department->Department_ID) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

        </div>

    </div>


    {{-- Success Message --}}

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    {{-- Errors --}}

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


    {{-- Department Information --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-dark text-white">

            <h4 class="mb-0">
                Department Information
            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <strong>
                        Department ID:
                    </strong>

                    <div>
                        {{ $department->Department_ID }}
                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <strong>
                        Department Name:
                    </strong>

                    <div>
                        {{ $department->Department_Name }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Students --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">
                Students
            </h4>

        </div>

        <div class="card-body">

            @if($department->students->count() > 0)

                <div class="table-responsive">

                    <table class="table table-bordered table-hover mb-0">

                        <thead class="table-dark">

                            <tr>

                                <th>
                                    University ID
                                </th>

                                <th>
                                    Name
                                </th>

                                <th>
                                    City
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($department->students as $student)

                                <tr>

                                    <td>
                                        {{ $student->University_ID }}
                                    </td>

                                    <td>
                                        {{ $student->name }}
                                    </td>

                                    <td>
                                        {{ $student->city ?? 'N/A' }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="alert alert-info mb-0">

                    No students in this department.

                </div>

            @endif

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

            @if($department->teachers->count() > 0)

                <div class="table-responsive">

                    <table class="table table-bordered table-hover mb-0">

                        <thead class="table-dark">

                            <tr>

                                <th>
                                    Teacher ID
                                </th>

                                <th>
                                    Name
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($department->teachers as $teacher)

                                <tr>

                                    <td>
                                        {{ $teacher->Teacher_ID }}
                                    </td>

                                    <td>
                                        {{ $teacher->name }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="alert alert-info mb-0">

                    No teachers in this department.

                </div>

            @endif

        </div>

    </div>


    {{-- Courses --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                Courses
            </h4>

        </div>

        <div class="card-body">

            @if($department->courses->count() > 0)

                <div class="table-responsive">

                    <table class="table table-bordered table-hover mb-0">

                        <thead class="table-dark">

                            <tr>

                                <th>
                                    Course ID
                                </th>

                                <th>
                                    Course Name
                                </th>

                                <th>
                                    Course Fee
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($department->courses as $course)

                                <tr>

                                    <td>
                                        {{ $course->Course_ID }}
                                    </td>

                                    <td>
                                        {{ $course->Course_Name }}
                                    </td>

                                    <td>
                                        {{ $course->Course_Fee ?? 'N/A' }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="alert alert-info mb-0">

                    No courses in this department.

                </div>

            @endif

        </div>

    </div>


    {{-- Chairman --}}

    <div class="card shadow-sm">

        <div class="card-header bg-secondary text-white">

            <h4 class="mb-0">
                Chairman
            </h4>

        </div>

        <div class="card-body">

            @if($department->chairman)

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <strong>
                            Chairman ID:
                        </strong>

                        <div>
                            {{ $department->chairman->Chairman_ID ?? 'N/A' }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>
                            Name:
                        </strong>

                        <div>
                            {{ $department->chairman->name ?? 'N/A' }}
                        </div>

                    </div>

                </div>

            @else

                <div class="alert alert-info mb-0">

                    No chairman assigned.

                </div>

            @endif

        </div>

    </div>

</div>

</body>

</html>