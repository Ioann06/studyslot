<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Consultation</title>
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
        <a href="/teacher" class="btn btn-outline-primary">Back to Dashboard</a>
    </div>
</nav>

<div class="container py-5" style="min-height: 75vh;">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">

                    <h1 class="fw-bold mb-2">Create Consultation</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p class="text-muted mb-4">
                        Fill in the details to create a new consultation slot.
                    </p>

                    <form method="POST" action="/teacher/store">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Title</label>
                            <input
                                type="text"
                                name="title"
                                class="form-control form-control-lg"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Course</label>
                            <select
                                name="course_id"
                                class="form-control form-control-lg"
                                required
                            >
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Date</label>
                            <input
                                type="date"
                                name="date"
                                class="form-control form-control-lg"
                                required
                            >
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Start Time</label>
                                <input
                                    type="time"
                                    name="start_time"
                                    class="form-control form-control-lg"
                                    required
                                >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">End Time</label>
                                <input
                                    type="time"
                                    name="end_time"
                                    class="form-control form-control-lg"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Max Students</label>
                            <input
                                type="number"
                                name="max_students"
                                class="form-control form-control-lg"
                                min="1"
                                required
                            >
                        </div>

                        <button class="btn btn-primary btn-lg w-100 mt-3">
                            Create Consultation
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