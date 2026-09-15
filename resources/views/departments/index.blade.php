<!DOCTYPE html>
<html>
<head>
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
</head>

<body>

<h1>All Departments</h1>

<div class="top">
    <a
        href="{{ route('departments.create') }}"
        class="btn blue"
    >
        Add Department
    </a>
</div>

<table>

    <thead>
        <tr>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    @forelse ($departments as $department)

        <tr>
            <td>{{ $department->Department_ID }}</td>

            <td>{{ $department->Department_Name }}</td>

            <td>

                <a
                    href="{{ route('departments.show', $department->Department_ID) }}"
                    class="btn blue"
                >
                    View
                </a>

                <a
                    href="{{ route('departments.edit', $department->Department_ID) }}"
                    class="btn blue"
                >
                    Edit
                </a>

                <form
                    action="{{ route('departments.destroy', $department->Department_ID) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')

                    <button class="btn red">
                        Delete
                    </button>
                </form>

            </td>
        </tr>

    @empty

        <tr>
            <td colspan="3">
                No Departments Found
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

</body>
</html>