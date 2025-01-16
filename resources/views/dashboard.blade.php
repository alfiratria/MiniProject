<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Proyek Tim</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #4e4db1;
            font-size: 2.5rem;
            font-weight: 600;
        }
        .header p {
            color: #777;
            font-size: 1.1rem;
        }
        .card {
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #4e4db1;
            color: white;
            font-size: 1.2rem;
            text-align: center;
            font-weight: 600;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            text-align: center;
            padding: 20px;
        }
        .card-title {
            font-size: 2.5rem;
            color: #4e4db1;
            font-weight: 700;
        }
        .card-text {
            color: #888;
            font-size: 1.1rem;
        }
        .btn-primary {
            background-color: #4e4db1;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #3b3a96;
        }
        /* Progress Bar Styles */
        .progress-bar-container {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 10px;
            margin-top: 10px;
        }
        .progress {
            height: 20px;
            border-radius: 10px;
        }
        .progress-text {
            font-size: 1rem;
            color: #333;
            margin-top: 5px;
        }
        .tooltip-inner {
            background-color: #4e4db1;
            color: white;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Dashboard Proyek Tim</h1>
        <p>Melihat progres tugas tim dalam tampilan sederhana dan jelas.</p>
    </div>

    <!-- Proyek Aktif -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Proyek Aktif</div>
                <div class="card-body">
                    <h2 class="card-title">3</h2>
                    <p class="card-text">Jumlah proyek yang sedang berjalan.</p>
                    <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat detail proyek aktif">Info</button>
                </div>
            </div>
        </div>

        <!-- Tugas Selesai -->
        <div class ="col-md-6">
            <div class="card">
                <div class="card-header">Tugas Selesai</div>
                <div class="card-body">
                    <h2 class="card-title">12</h2>
                    <p class="card-text">Jumlah tugas yang telah diselesaikan.</p>
                    <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat detail tugas selesai">Info</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Bar Tugas -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Progres Tugas</div>
                <div class="card-body">
                    <!-- Progress Task A -->
                    <div class="progress-bar-container">
                        <div class="progress" style="width: 100%; background-color: #4e4db1;"></div>
                    </div>
                    <p class="progress-text">Tugas Besar WAD - 100% Selesai</p>

                    <!-- Progress Task B -->
                    <div class="progress-bar-container">
                        <div class="progress" style="width: 60%; background-color: #ffb84d;"></div>
                    </div>
                    <p class="progress-text">Tugas Besar Manajemen Proyek Sistem Informasi - 60% Selesai</p>

                    <!-- Progress Task C -->
                    <div class="progress-bar-container">
                        <div class="progress" style="width: 30%; background-color: #ff6347;"></div>
                    </div>
                    <p class="progress-text">Tugas Besar Penambangan Data - 30% Selesai</p>

                    <!-- Progress Task D -->
                    <div class="progress-bar-container">
                        <div class="progress" style="width: 10%; background-color: #ff6f61;"></div>
                    </div>
                    <p class="progress-text">Tugas Sistem Operasi - 10% Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('projects.index') }}" class="btn-primary">Lihat Semua Proyek</a>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</body>
</html>