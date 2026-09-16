<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
<style>
        body { font-family: Arial, sans-serif; }

        .box {
            width: 500px;
            margin: 40px auto;
        }

        input, select {
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
    </head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Edit User</h1>

    @if($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form action="{{ route('users.update', $user->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>

            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label>Phone</label>

            <input type="text"
                   name="phone"
                   class="form-control"
                   value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="mb-3">
            <label>Password</label>

            <input type="password"
                   name="password"
                   class="form-control">

            <small class="text-muted">
                Leave empty if you don't want to change the password.
            </small>
        </div>

        <div class="mb-3">
            <label>Role</label>

            <select name="role" class="form-control">

                <option value="user"
                    {{ $user->role == 'user' ? 'selected' : '' }}>
                    User
                </option>

                <option value="admin"
                    {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

            </select>
        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('users.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

</body>
</html>
 