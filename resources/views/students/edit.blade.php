<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .box {
            width: 500px;
            margin: 40px auto;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .btn {
            display: inline-block;
            padding: 9px 15px;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .blue {
            background: #00b7e9;
        }

        .gray {
            background: #777;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="box">

    <h1>Edit Student</h1>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('students.update', $student->University_ID) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <input
            type="text"
            name="name"
            value="{{ old('name', $student->name) }}"
            required
        >

        <input
            type="text"
            name="street"
            value="{{ old('street', $student->street) }}"
        >

        <input
            type="text"
            name="city"
            value="{{ old('city', $student->city) }}"
        >

        <input
            type="text"
            name="zip"
            value="{{ old('zip', $student->zip) }}"
        >

        <select name="Department_ID">
            <option value="">Select Department</option>

            @foreach ($departments as $department)
                <option
                    value="{{ $department->Department_ID }}"
                    @selected(
                        old(
                            'Department_ID',
                            $student->Department_ID
                        ) == $department->Department_ID
                    )
                >
                    {{ $department->Department_Name }}
                </option>
            @endforeach
        </select>

        <button
            type="submit"
            class="btn blue"
        >
            Update Student
        </button>

        <a
            href="{{ route('students.show', $student->University_ID) }}"
            class="btn gray"
        >
            Back
        </a>
    </form>

</div>

</body>
</html>