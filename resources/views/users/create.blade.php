<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>

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

<div class="box">

    <h1>Add User</h1>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('users.store') }}"
        method="POST"
    >
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Name"
            value="{{ old('name') }}"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
            value="{{ old('email') }}"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <select name="role" required>
            <option value="">Select Role</option>

            <option value="user">
                User
            </option>

            <option value="admin">
                Admin
            </option>
        </select>

        <button
            type="submit"
            class="btn blue"
        >
            Add User
        </button>

        <a
            href="{{ route('users.index') }}"
            class="btn gray"
        >
            Back
        </a>
    </form>

</div>

</body>
</html>