<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
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

<div class="container mt-5">

    <h1 class="mb-4">User Details</h1>

    <div class="card">

        <div class="card-body">

            <h3>{{ $user->name }}</h3>

            <p>
                <strong>ID:</strong>
                {{ $user->id }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $user->email }}
            </p>

            <p>
                <strong>Phone:</strong>
                {{ $user->phone }}
            </p>

            <p>
                <strong>Role:</strong>
                {{ $user->role }}
            </p>

            @if($user->student)

                <hr>

                <h4>Student Information</h4>

                @if($user->student->department)
                    <p>
                        <strong>Department:</strong>
                        {{ $user->student->department->name }}
                    </p>
                @endif

                <h5>Courses</h5>

                @forelse($user->student->courses as $course)

                    <span class="badge bg-primary">
                        {{ $course->name }}
                    </span>

                @empty

                    <p>No courses</p>

                @endforelse

                <h5 class="mt-3">Phones</h5>

                @forelse($user->student->phones as $phone)

                    <p>{{ $phone->phone }}</p>

                @empty

                    <p>No phones</p>

                @endforelse

            @endif


            @if($user->teacher)

                <hr>

                <h4>Teacher Information</h4>

                @if($user->teacher->department)
                    <p>
                        <strong>Department:</strong>
                        {{ $user->teacher->department->name }}
                    </p>
                @endif

                <h5>Courses</h5>

                @forelse($user->teacher->courses as $course)

                    <span class="badge bg-success">
                        {{ $course->name }}
                    </span>

                @empty

                    <p>No courses</p>

                @endforelse

            @endif

        </div>

    </div>

    <div class="mt-3">

        <a href="{{ route('users.edit', $user->id) }}"
           class="btn btn-warning">
            Edit
        </a>

        <a href="{{ route('users.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>

</div>

</body>
</html>
