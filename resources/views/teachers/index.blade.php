<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Teachers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="mb-0">
            Teachers
        </h1>

        <a
            href="{{ route('teachers.create') }}"
            class="btn btn-primary"
        >
            Add Teacher
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped mb-0">

                    <thead class="table-dark">

                        <tr>
                            <th>Teacher ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Department</th>
                            <th>Courses</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($teachers as $teacher)

                            <tr>

                                <td>
                                    {{ $teacher->Teacher_ID }}
                                </td>

                                <td>
                                    {{ $teacher->name }}
                                </td>

                                <td>
                                    {{ $teacher->type ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $teacher->department?->Department_Name ?? 'No Department' }}
                                </td>

                                <td>
                                    {{ $teacher->courses->count() }}
                                </td>

                                <td>

                                    <div class="d-flex gap-2">

                                        <a
                                            href="{{ route('teachers.show', $teacher->Teacher_ID) }}"
                                            class="btn btn-sm btn-info text-white"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="{{ route('teachers.edit', $teacher->Teacher_ID) }}"
                                            class="btn btn-sm btn-warning"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('teachers.destroy', $teacher->Teacher_ID) }}"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this teacher?')"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center py-4"
                                >
                                    No teachers found.
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>