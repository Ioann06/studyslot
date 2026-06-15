<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Consultation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: linear-gradient(135deg, #eef4ff, #f8fbff); }
        .navbar { padding: 15px 0; }
        .btn { border-radius: 12px; }
        .card { transition: 0.2s ease; }
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
        <a href="/consultations" class="btn btn-outline-primary">Back</a>
    </div>
</nav>

<div class="container py-5" style="min-height: 75vh;">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">

                    <h1 class="fw-bold mb-2">Book Consultation</h1>
                    <p class="text-muted mb-4">Enter your details to reserve this consultation.</p>

                    <div class="bg-light rounded-4 p-4 mb-4">
                        <h4 class="fw-bold">{{ $slot->title }}</h4>
                        <p class="mb-1">📚 <b>Course:</b> {{ $slot->course->title }}</p>
                        <p class="mb-1">📅 <b>Date:</b> {{ $slot->date }}</p>
                        <p class="mb-0">⏰ <b>Time:</b> {{ $slot->start_time }} - {{ $slot->end_time }}</p>
                    </div>

                    <form method="POST" action="/book">
                        @csrf

                        <input type="hidden" name="consultation_slot_id" value="{{ $slot->id }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="student_name" class="form-control form-control-lg" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="student_email" class="form-control form-control-lg" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Message</label>
                            <textarea name="message" class="form-control form-control-lg" rows="4"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Book Consultation
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted">
    © 2026 StudySlot
</footer>

</body>
</html>