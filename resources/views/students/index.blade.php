<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Students</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Students
        </h1>

        <a
            href="{{ route('students.create') }}"
            class="btn btn-primary"
        >
            Add Student
        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            @foreach($errors->all() as $error)

                <div>
                    {{ $error }}
                </div>

            @endforeach

        </div>

    @endif


    <div class="card shadow-sm">

        <div class="card-body p-0">

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
                                Department
                            </th>

                            <th>
                                Courses
                            </th>

                            <th>
                                Phones
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($students as $student)

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
                                    {{ $student->courses->count() }}
                                </td>

                                <td>
                                    {{ $student->phones->count() }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('students.show', $student->University_ID) }}"
                                        class="btn btn-sm btn-info text-white"
                                    >
                                        View
                                    </a>


                                    <a
                                        href="{{ route('students.edit', $student->University_ID) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('students.destroy', $student->University_ID) }}"
                                        method="POST"
                                        style="display:inline;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this student?')"
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
                                    class="text-center"
                                >
                                    No students found.
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