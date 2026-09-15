<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>

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

    <h1>Edit Course</h1>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('courses.update', $course->Course_ID) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <input
            type="text"
            name="Course_Name"
            value="{{ old('Course_Name', $course->Course_Name) }}"
            required
        >

        <input
            type="number"
            step="0.01"
            min="0"
            name="Course_Fee"
            value="{{ old('Course_Fee', $course->Course_Fee) }}"
            required
        >

        <button
            type="submit"
            class="btn blue"
        >
            Update Course
        </button>

        <a
            href="{{ route('courses.show', $course->Course_ID) }}"
            class="btn gray"
        >
            Back
        </a>
    </form>

</div>

</body>
</html>