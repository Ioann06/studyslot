<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StudySlot</title>
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

        .hero-title {
            line-height: 1.1;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary fs-3" href="/">StudySlot</a>

        <div>
            <a href="/consultations" class="btn btn-outline-primary me-2">Consultations</a>
            <a href="/teacher" class="btn btn-primary">Teacher Dashboard</a>
        </div>
    </div>
</nav>

<section class="container py-5">
    <div class="row align-items-center py-5">

        <div class="col-lg-6">
            <span class="badge bg-primary mb-3 px-3 py-2">
                Student Consultation System
            </span>

            <h1 class="display-3 fw-bold mb-4 hero-title">
                Book study consultations easily
            </h1>

            <p class="lead text-muted mb-4">
                StudySlot helps students find available consultation slots,
                book meetings with teachers, and manage appointments online.
            </p>

            <a href="/consultations" class="btn btn-primary btn-lg me-2">
                View Consultations
            </a>

            <a href="/teacher" class="btn btn-outline-primary btn-lg">
                Teacher Dashboard
            </a>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">

                    <h3 class="fw-bold mb-4">Why StudySlot?</h3>

                    <div class="mb-3">
                        <h5>✅ Easy booking</h5>
                        <p class="text-muted">Students can quickly book available consultations.</p>
                    </div>

                    <div class="mb-3">
                        <h5>📅 Simple scheduling</h5>
                        <p class="text-muted">Teachers can create and manage consultation slots.</p>
                    </div>

                    <div>
                        <h5>💻 Online management</h5>
                        <p class="text-muted mb-0">Everything is organized in one clean dashboard.</p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<footer class="text-center py-4 text-muted">
    © 2026 StudySlot
</footer>

</body>
</html>