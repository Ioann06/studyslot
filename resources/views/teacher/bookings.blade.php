<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: linear-gradient(135deg, #eef4ff, #f8fbff); }
        .navbar { padding: 15px 0; }
        .btn { border-radius: 12px; }
        .table { background: white; }
    </style>
</head>
<body>

<nav class="navbar bg-white shadow-sm">
    <div class="container">
        <a href="/" class="navbar-brand fw-bold text-primary fs-3">StudySlot</a>
        <a href="/teacher" class="btn btn-outline-primary">Dashboard</a>
    </div>
</nav>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Student Bookings</h1>
            <p class="text-muted mb-0">Approve or reject consultation requests.</p>
        </div>

        <div class="badge bg-primary fs-6 p-3 rounded-4">
            Total: {{ $bookings->count() }}
        </div>
    </div>

    @if($bookings->count() == 0)
        <div class="alert alert-info shadow-sm rounded-4">
            No bookings found.
        </div>
    @else
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-body p-4">

                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Email</th>
                            <th>Consultation</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->student_name }}</td>
                                <td>{{ $booking->student_email }}</td>
                                <td>{{ $booking->consultationSlot->title }}</td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                                <td>
                                    <form method="POST" action="/teacher/bookings/{{ $booking->id }}/approve" class="d-inline">
                                        @csrf
                                        <button class="btn btn-success btn-sm">
                                            Approve
                                        </button>
                                    </form>

                                    <form method="POST" action="/teacher/bookings/{{ $booking->id }}/reject" class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            Reject
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    @endif

</div>

</body>
</html>