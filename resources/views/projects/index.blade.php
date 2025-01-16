<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Universal Styling for the Body */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    color: #495057;
}

/* Container Styling */
.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 0 15px;
}

/* Header Styling */
h1 {
    font-size: 32px;
    font-weight: 700;
    text-align: center;
    color: #343a40;
    margin-bottom: 30px;
}

/* Button Styling */
.btn {
    border-radius: 30px; /* Tumpul pada tombol */
    font-weight: 600;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Card Styling */
.card {
    border-radius: 15px; /* Semua sisi kotak tumpul */
    margin-bottom: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    transition: transform 0.2s;
    overflow: hidden; /* Menjaga sudut tumpul di dalam card */
}

/* Card Header Styling */
.card-header {
    background: linear-gradient(135deg, #6f42c1, #007bff); /* Kombinasi warna baru */
    color: #fff;
    padding: 20px;
    font-size: 18px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 15px 15px 0 0; /* Tumpul hanya di bagian atas */
}

/* Card Body Styling */
.card-body {
    padding: 20px;
    min-height: 150px; /* Menjamin tinggi minimal untuk konten */
    border-radius: 15px; /* Tumpul semua sisi */
}

/* Progress Bar Styling */
.progress {
    height: 8px;
    border-radius: 5px;
    background-color: #e9ecef;
}

.progress-bar-custom {
    background-color: #28a745; /* Warna hijau */
}

/* Card Footer Styling */
.card-footer {
    background-color: #f1f3f5;
    padding: 25px;
    font-size: 14px;
    border-radius: 15px; /* Tumpul semua sisi */
}

/* Task Status Styling */
.task-status {
    font-size: 13px;
    padding: 4px 8px;
    border-radius: 12px;
    font-weight: 500;
    background-color: transparent;
    color: #495057;
    border: 1px solid #dee2e6;
}

/* Action Buttons Styling */
.action-buttons {
    display: flex;
    gap: 10px; /* Menjaga tombol tetap bersebelahan */
    align-items: center;
}

/* Text Alignment for Right Aligned Links */
.text-right a {
    font-size: 16px;
    font-weight: 600;
}

/* Styling for Text Links */
a.text-white {
    text-decoration: none;
}

a.text-white:hover {
    color: #f8f9fa;
}

/* Styling for Task Links */
.task-link {
    display: inline-block;
    font-size: 14px;
    color: #007bff;
    font-weight: 600;
    margin-top: 10px;
}

.task-link:hover {
    text-decoration: underline;
}

/* Responsive Design for Columns */
@media (max-width: 991px) {
    .col-md-4 {
        flex: 0 0 50%; /* 2 kolom pada layar lebih kecil */
        max-width: 50%;
    }
}

@media (max-width: 767px) {
    .col-md-4 {
        flex: 0 0 100%; /* 1 kolom pada layar kecil */
        max-width: 100%;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Proyek</h1>

        <div class="mb-4">
            <a href="{{ route('dashboard') }}" class="btn btn-back" title="Kembali ke halaman sebelumnya">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="text-right mb-4">
            <a href="{{ route('projects.create') }}" class="btn btn-primary" title="Tambahkan proyek baru">
            <i class="fas fa-plus-circle"></i>Tambah Proyek Baru
            </a>
        </div>

        @if($projects->isEmpty())
            <p class="text-center">Tidak ada proyek yang ditemukan.</p>
        @else
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('projects.show', $project->id) }}" class="text-white" title="Lihat detail proyek">{{ $project->name }}</a>
                                <div class="action-buttons">
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning" title="Edit proyek ini">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Hapus proyek ini">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>{{ $project->description }}</p>

                                <!-- Progress Bar -->
                                @php
                                    $totalTasks = $project->tasks->count();
                                    $completedTasks = $project->tasks->where('status', 'Completed')->count();
                                    $progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
                                @endphp
                                <div class="progress">
                                    <div class="progress-bar progress-bar-custom" style="width: {{ $progress }}%"></div>
                                </div>
                                <p class="mt-2">{{ round($progress) }}% Selesai ({{ $completedTasks }} dari {{ $totalTasks }} tugas)</p>
                                <a href="{{ route('tasks.index', $project->id) }}" class="task-link">Lihat Semua Tugas</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
