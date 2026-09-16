
@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Users</h1>

        <a href="{{ route('users.create') }}" class="btn btn-primary">
            Add User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($users as $user)

                <tr>
                    <td>
                        {{ $user->id }}
                    </td>

                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        {{ $user->phone }}
                    </td>

                    <td>
                        {{ $user->role }}
                    </td>

                    <td>

                        <a
                            href="{{ route('users.show', $user->id) }}"
                            class="btn btn-info btn-sm"
                        >
                            Show
                        </a>

                        <a
                            href="{{ route('users.edit', $user->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('users.destroy', $user->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')"
                            >
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No users found
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
