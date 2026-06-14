<!DOCTYPE html>
<html>
<head>
    <title>Book Consultation</title>
</head>
<body>
    <h1>Book Consultation</h1>

    <h3>{{ $slot->title }}</h3>
    <p><b>Course:</b> {{ $slot->course->title }}</p>
    <p><b>Date:</b> {{ $slot->date }}</p>
    <p><b>Time:</b> {{ $slot->start_time }} - {{ $slot->end_time }}</p>

    <form method="POST" action="/book">
        @csrf

        <input type="hidden" name="consultation_slot_id" value="{{ $slot->id }}">

        <p>
            <label>Name:</label><br>
            <input type="text" name="student_name" required>
        </p>

        <p>
            <label>Email:</label><br>
            <input type="email" name="student_email" required>
        </p>

        <p>
            <label>Message:</label><br>
            <textarea name="message"></textarea>
        </p>

        <button type="submit">Book consultation</button>
    </form>

    <br>
    <a href="/consultations">Back</a>
</body>
</html>