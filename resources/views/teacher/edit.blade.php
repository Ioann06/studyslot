<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Consultation</title>
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
    </style>
</head>
<body>

<nav class="navbar bg-white shadow-sm">
    <div class="container">
        <a href="/" class="navbar-brand fw-bold text-primary fs-3">
            StudySlot
        </a>

        <a href="/teacher" class="btn btn-outline-primary">
            Back
        </a>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">

                    <h1 class="fw-bold mb-4">
                        Edit Consultation
                    </h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/teacher/update/{{ $slot->id }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="{{ $slot->title }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input
                                type="date"
                                name="date"
                                class="form-control"
                                value="{{ $slot->date }}"
                                required
                            >
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Start Time</label>
                                <input
                                    type="time"
                                    name="start_time"
                                    class="form-control"
                                    value="{{ $slot->start_time }}"
                                    required
                                >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">End Time</label>
                                <input
                                    type="time"
                                    name="end_time"
                                    class="form-control"
                                    value="{{ $slot->end_time }}"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Max Students</label>
                            <input
                                type="number"
                                name="max_students"
                                class="form-control"
                                value="{{ $slot->max_students }}"
                                min="1"
                                required
                            >
                        </div>

                        <button class="btn btn-success w-100">
                            Save Changes
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>