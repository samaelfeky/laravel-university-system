<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Teacher</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Add Teacher
        </h1>

        <a
            href="{{ route('teachers.index') }}"
            class="btn btn-secondary"
        >
            Back to Teachers
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

    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="{{ route('teachers.store') }}"
                method="POST"
            >

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Teacher ID
                    </label>

                    <input
                        type="number"
                        name="Teacher_ID"
                        class="form-control"
                        value="{{ old('Teacher_ID') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Teacher Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Department
                    </label>

                    <select
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

                <div class="mb-3">

                    <label class="form-label">
                        User ID
                    </label>

                    <input
                        type="number"
                        name="user_id"
                        class="form-control"
                        value="{{ old('user_id') }}"
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Add Teacher
                </button>

                <a
                    href="{{ route('teachers.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>