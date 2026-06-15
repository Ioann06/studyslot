<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(135deg, #eef4ff, #f8fbff);">

<nav class="navbar bg-white shadow-sm">
    <div class="container">
        <a href="/" class="navbar-brand fw-bold text-primary fs-3">StudySlot</a>
        <a href="/" class="btn btn-outline-primary">Back to Home</a>
    </div>
</nav>

<div class="container py-5">
    <div class="mb-4">
        <h1 class="fw-bold">Available Consultations</h1>
        <p class="text-muted">Choose a consultation slot and book your meeting.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($slots as $slot)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <span class="badge bg-success mb-3">
                            {{ $slot->status }}
                        </span>

                        <h4 class="fw-bold">{{ $slot->title }}</h4>

                        <p class="text-muted mb-2">
                            📚 {{ $slot->course->title }}
                        </p>

                        <p class="text-muted mb-2">
                            📅 {{ $slot->date }}
                        </p>

                        <p class="text-muted mb-4">
                            ⏰ {{ $slot->start_time }} - {{ $slot->end_time }}
                        </p>

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