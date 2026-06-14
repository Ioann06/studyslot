<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
</head>
<body>
    <h1>Teacher Dashboard</h1>

    @foreach($bookings as $booking)
        <div style="border:1px solid #ccc; padding:15px; margin:10px;">
            <h3>{{ $booking->consultationSlot->title }}</h3>
            <p><b>Course:</b> {{ $booking->consultationSlot->course->title }}</p>
            <p><b>Student:</b> {{ $booking->student_name }}</p>
            <p><b>Email:</b> {{ $booking->student_email }}</p>
            <p><b>Message:</b> {{ $booking->message }}</p>
            <p><b>Status:</b> {{ $booking->status }}</p>
        </div>
    @endforeach

    <a href="/">Back home</a>
</body>
</html>