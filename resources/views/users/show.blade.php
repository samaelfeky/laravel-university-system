<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>

    <style>
        body { font-family: Arial, sans-serif; }

        h1, h2 { text-align: center; }

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

        .section {
            width: 90%;
            margin: 30px auto;
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
        .gray { background: #777; }

        .info td:first-child {
            font-weight: bold;
            width: 200px;
        }

        form { display: inline; }
    </style>
</head>

<body>

<h1>User Details</h1>

<div class="section">

    <table class="info">

        <tr>
            <td>ID</td>
            <td>{{ $user->id }}</td>
        </tr>

        <tr>
            <td>Name</td>
            <td>{{ $user->name }}</td>
        </tr>

        <tr>
            <td>Email</td>
            <td>{{ $user->email }}</td>
        </tr>

        <tr>
            <td>Role</td>
            <td>{{ $user->role }}</td>
        </tr>

    </table>

</div>

@if ($user->student)

<div class="section">

    <h2>Student</h2>

    <table>

        <tr>
            <th>University ID</th>
            <td>{{ $user->student->University_ID }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $user->student->name }}</td>
        </tr>

        <tr>
            <th>Department</th>
            <td>
                {{ $user->student->department?->Department_Name ?? 'No Department' }}
            </td>
        </tr>

    </table>

</div>

@endif

@if ($user->teacher)

<div class="section">

    <h2>Teacher</h2>

    <table>

        <tr>
            <th>Teacher ID</th>
            <td>{{ $user->teacher->Teacher_ID }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $user->teacher->name }}</td>
        </tr>

        <tr>
            <th>Type</th>
            <td>{{ $user->teacher->type ?? 'N/A' }}</td>
        </tr>

        <tr>
            <th>Department</th>
            <td>
                {{ $user->teacher->department?->Department_Name ?? 'No Department' }}
            </td>
        </tr>

    </table>

</div>

@endif

<div class="section">

    <a
        href="{{ route('users.index') }}"
        class="btn gray"
    >
        Back
    </a>

    <a
        href="{{ route('users.edit', $user->id) }}"
        class="btn blue"
    >
        Edit
    </a>

    <form
        action="{{ route('users.destroy', $user->id) }}"
        method="POST"
    >

        @csrf
        @method('DELETE')

        <button class="btn red">
            Delete
        </button>

    </form>

</div>

</body>
</html>