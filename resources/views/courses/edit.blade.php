<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Edit User</title>
<style>
        body { font-family: Arial, sans-serif; }

        .box {
            width: 500px;
            margin: 40px auto;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .btn {
            padding: 9px 15px;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .blue { background: #00b7e9; }
        .gray { background: #777; }
        .error { color: red; }
    </style>
    <x-cssbootstrap></x-cssbootstrap>

</head>

<body>

    <x-navbarcomponent></x-navbarcomponent>


    <div class="container mt-5">

        <h1 class="mb-4">
            Edit User
        </h1>


        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('users.update', $user->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            {{-- Name --}}

            <div class="mb-3">

                <label
                    for="name"
                    class="form-label"
                >
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                >

            </div>


            {{-- Email --}}

            <div class="mb-3">

                <label
                    for="email"
                    class="form-label"
                >
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                >

            </div>


            {{-- Password --}}

            <div class="mb-3">

                <label
                    for="password"
                    class="form-label"
                >
                    New Password
                </label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                >

                <small class="text-muted">
                    Leave empty if you do not want to change the password.
                </small>

            </div>


            {{-- Password Confirmation --}}

            <div class="mb-3">

                <label
                    for="password_confirmation"
                    class="form-label"
                >
                    Confirm New Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                >

            </div>


            {{-- Role --}}

            <div class="mb-3">

                <label
                    for="role"
                    class="form-label"
                >
                    Role
                </label>

                <select
                    name="role"
                    id="role"
                    class="form-select"
                >

                    <option value="">
                        Select Role
                    </option>

                    <option
                        value="user"
                        {{ old('role', $user->role) == 'user' ? 'selected' : '' }}
                    >
                        User
                    </option>

                    <option
                        value="admin"
                        {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="btn btn-primary"
            >
                Update User
            </button>


            <a
                href="{{ route('users.show', $user->id) }}"
                class="btn btn-secondary"
            >
                Cancel
            </a>

        </form>

    </div>


    <x-jsbootstrap></x-jsbootstrap>

</body>

</html>
    
