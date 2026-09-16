<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Departments</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th { background: #f5f5f5; }

        h1 { text-align: center; }

        .top {
            width: 90%;
            margin: auto;
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

        .blue { background: #00b7e9; }
        .red { background: #ef4444; }

        form { display: inline; }
    </style>
    <x-cssbootstrap></x-cssbootstrap>
</head>

<body>

    <x-navbarcomponent></x-navbarcomponent>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Departments</h1>

            <a href="{{ route('departments.create') }}"
               class="btn btn-primary">
                Add Department
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">

            <table class="table table-bordered table-striped align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>Department ID</th>
                        <th>Department Name</th>
                        <th>Students</th>
                        <th>Teachers</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($departments as $department)

                        <tr>

                            <td>
                                {{ $department->Department_ID }}
                            </td>

                            <td>
                                {{ $department->Department_Name }}
                            </td>

                            <td>
                                {{ $department->students->count() }}
                            </td>

                            <td>
                                {{ $department->teachers->count() }}
                            </td>

                            <td>

                                <a href="{{ route('departments.show', $department->Department_ID) }}"
                                   class="btn btn-info btn-sm">
                                    View
                                </a>

                                <a href="{{ route('departments.edit', $department->Department_ID) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('departments.destroy', $department->Department_ID) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this department?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center">
                                No departments found.
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

    <x-jsbootstrap></x-jsbootstrap>

</body>
</html>
    