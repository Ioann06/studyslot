<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef4ff, #f8fbff);
        }

        .navbar {
            padding: 15px 0;
        }

        .btn {
            border-radius: 12px;
        }

        .card {
            transition: 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.12) !important;
        }
    </style>
</head>
<body>

<nav class="navbar bg-white shadow-sm">
    <div class="container">
        <a href="/" class="navbar-brand fw-bold text-primary fs-3">StudySlot</a>
        <a href="/" class="btn btn-outline-primary">Back to Home</a>
    </div>
</nav>

<div class="container py-5" style="min-height: 75vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Available Consultations</h1>
            <p class="text-muted mb-0">Choose a consultation slot and book your meeting.</p>
        </div>

        <div class="badge bg-primary fs-6 p-3 rounded-4">
            Total: {{ $slots->count() }}
        </div>
    </div>


    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        @foreach($slots as $slot)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg rounded-4 h-100">
                    <div class="card-body p-4">
                        <span class="badge bg-success rounded-pill px-3 py-2 mb-3">
                            {{ $slot->status }}
                        </span>

                        <h3 class="fw-bold mb-3">{{ $slot->title }}</h3>

                        <div class="bg-light rounded-4 p-3 mb-3">
                            <p class="mb-2">📚 <b>Course:</b> {{ $slot->course->title }}</p>
                            <p class="mb-2">📅 <b>Date:</b> {{ $slot->date }}</p>
                            <p class="mb-0">⏰ <b>Time:</b> {{ $slot->start_time }} - {{ $slot->end_time }}</p>
                        </div>

                        <a href="/book/{{ $slot->id }}" class="btn btn-primary w-100">
                            Book Consultation
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<footer class="text-center py-4 text-muted">
    © 2026 StudySlot
</footer>

</body>
</html>