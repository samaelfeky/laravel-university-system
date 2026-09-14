<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Tables Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h2 class="mb-4 text-center">System Database Tables</h2>
        <div class="list-group">
            @foreach($tables as $table)
                <a href="{{ route('map.show', $table) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center fs-5">
                    View <strong>{{ ucfirst($table) }}</strong> Table
                    <span class="badge bg-primary rounded-pill">View</span>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>