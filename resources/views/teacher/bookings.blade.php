<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">
        <h1>My Bookings</h1>

        <a href="/teacher" class="btn btn-primary">
            Dashboard
        </a>
    </div>

    @if($bookings->count() == 0)
        <div class="alert alert-info">
            No bookings found.
        </div>
    @else

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Email</th>
                    <th>Consultation</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->student_name }}</td>
                        <td>{{ $booking->student_email }}</td>
                        <td>{{ $booking->consultationSlot->title }}</td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    @endif

</div>

</body>
</html>