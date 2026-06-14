<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
</head>
<body>

<h1>Teacher Dashboard</h1>

<a href="/teacher/create">Create Consultation</a>

<hr>

@foreach($slots as $slot)
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3>{{ $slot->title }}</h3>
        <p>Date: {{ $slot->date }}</p>
        <p>Time: {{ $slot->start_time }} - {{ $slot->end_time }}</p>
        <p>Status: {{ $slot->status }}</p>
    </div>
@endforeach

</body>
</html>