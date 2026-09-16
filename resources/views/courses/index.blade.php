<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Courses</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Courses
        </h1>

        <a
            href="{{ route('courses.create') }}"
            class="btn btn-primary"
        >
            Add Course
        </a>

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


    <div class="card shadow-sm">

        <div class="card-body p-0">

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
                                Department
                            </th>

                            <th>
                                Students
                            </th>

                            <th>
                                Teachers
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($courses as $course)

                            <tr>

                                <td>
                                    {{ $course->Course_ID }}
                                </td>

                                <td>
                                    {{ $course->Course_Name }}
                                </td>

                                <td>

                                    {{ $course->department?->Department_Name ?? 'No Department' }}

                                </td>

                                <td>

                                    {{ $course->students->count() }}

                                </td>

                                <td>

                                    {{ $course->teachers->count() }}

                                </td>

                                <td>

                                    <a
                                        href="{{ route('courses.show', $course->Course_ID) }}"
                                        class="btn btn-sm btn-info text-white"
                                    >
                                        View
                                    </a>


                                    <a
                                        href="{{ route('courses.edit', $course->Course_ID) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('courses.destroy', $course->Course_ID) }}"
                                        method="POST"
                                        style="display:inline;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this course?')"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center py-4"
                                >
                                    No courses found.
                                </td>

                            </tr>

                        @endforelse
                        @extends('layouts.app')

@section('content')

    <h1>Users</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary">
        Add User
    </a>

@endsection

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>