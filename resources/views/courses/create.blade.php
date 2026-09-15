<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Course</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Add Course
        </h1>

        <a
            href="{{ route('courses.index') }}"
            class="btn btn-secondary"
        >
            Back to Courses
        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="{{ route('courses.store') }}"
                method="POST"
            >

                @csrf


                <div class="mb-3">

                    <label
                        for="Course_ID"
                        class="form-label"
                    >
                        Course ID
                    </label>

                    <input
                        type="number"
                        id="Course_ID"
                        name="Course_ID"
                        class="form-control"
                        value="{{ old('Course_ID') }}"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="Course_Name"
                        class="form-label"
                    >
                        Course Name
                    </label>

                    <input
                        type="text"
                        id="Course_Name"
                        name="Course_Name"
                        class="form-control"
                        value="{{ old('Course_Name') }}"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="Course_Fee"
                        class="form-label"
                    >
                        Course Fee
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        id="Course_Fee"
                        name="Course_Fee"
                        class="form-control"
                        value="{{ old('Course_Fee') }}"
                    >

                </div>


                @if(isset($departments))

                    <div class="mb-3">

                        <label
                            for="Department_ID"
                            class="form-label"
                        >
                            Department
                        </label>

                        <select
                            id="Department_ID"
                            name="Department_ID"
                            class="form-select"
                        >

                            <option value="">
                                Select Department
                            </option>

                            @foreach($departments as $department)

                                <option
                                    value="{{ $department->Department_ID }}"
                                    @selected(
                                        old('Department_ID') == $department->Department_ID
                                    )
                                >

                                    {{ $department->Department_Name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                @endif


                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Add Course
                    </button>


                    <a
                        href="{{ route('courses.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>