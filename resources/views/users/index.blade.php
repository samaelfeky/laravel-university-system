<!DOCTYPE html>
<html>
<head>
    <title>Edit Department</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>

<body>

<div class="box">

    <h1>Edit Department</h1>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('departments.update', $department->Department_ID) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <input
            type="text"
            name="Department_Name"
            value="{{ old('Department_Name', $department->Department_Name) }}"
            required
        >

        <button
            type="submit"
            class="btn blue"
        >
            Update Department
        </button>

        <a
            href="{{ route('departments.show', $department->Department_ID) }}"
            class="btn gray"
        >
            Back
        </a>
    </form>

</div>

</body>
</html>