<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Student</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Add Student
        </h1>

        <a
            href="{{ route('students.index') }}"
            class="btn btn-secondary"
        >
            Back to Students
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
                action="{{ route('students.store') }}"
                method="POST"
            >

                @csrf


                <div class="mb-3">

                    <label
                        for="University_ID"
                        class="form-label"
                    >
                        University ID
                    </label>

                    <input
                        type="text"
                        id="University_ID"
                        name="University_ID"
                        class="form-control"
                        value="{{ old('University_ID') }}"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Student Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="street"
                        class="form-label"
                    >
                        Street
                    </label>

                    <input
                        type="text"
                        id="street"
                        name="street"
                        class="form-control"
                        value="{{ old('street') }}"
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="city"
                        class="form-label"
                    >
                        City
                    </label>

                    <input
                        type="text"
                        id="city"
                        name="city"
                        class="form-control"
                        value="{{ old('city') }}"
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="zip"
                        class="form-label"
                    >
                        ZIP
                    </label>

                    <input
                        type="text"
                        id="zip"
                        name="zip"
                        class="form-control"
                        value="{{ old('zip') }}"
                    >

                </div>


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
                        required
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

                    <label
                        for="user_id"
                        class="form-label"
                    >
                        User
                    </label>

                    <input
                        type="number"
                        id="user_id"
                        name="user_id"
                        class="form-control"
                        value="{{ old('user_id') }}"
                    >

                </div>


                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Add Student
                    </button>

                    <a
                        href="{{ route('students.index') }}"
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