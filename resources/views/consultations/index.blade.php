<!DOCTYPE html>
<html>
<head>
    <title>Consultations</title>
</head>
<body>
    <h1>Available Consultations</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @foreach($slots as $slot)
        <div style="border:1px solid #ccc; padding:15px; margin:10px;">
            <h3>{{ $slot->title }}</h3>
            <p><b>Course:</b> {{ $slot->course->title }}</p>
            <p><b>Date:</b> {{ $slot->date }}</p>
            <p><b>Time:</b> {{ $slot->start_time }} - {{ $slot->end_time }}</p>
            <p><b>Status:</b> {{ $slot->status }}</p>

            <a href="/book/{{ $slot->id }}">Book</a>
        </div>
    @endforeach

    <br>
    <a href="/">Back to home</a>
</body>
</html>