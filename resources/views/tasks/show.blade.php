<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Body Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Centered Container */
        .container {
            width: 100%;
            max-width: 900px;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 30px;
            font-weight: bold;
            color: #4e73df;
            margin-bottom: 20px;
        }

        .task-info {
            background-color: #e9f7ff;
            padding: 20px;
            border-radius: 8px;
            border-left: 5px solid #4e73df;
            margin-bottom: 30px;
            text-align: left;
        }

        .task-info p {
            margin: 12px 0;
            font-size: 18px;
            color: #333;
            line-height: 1.5;
        }

        /* Task Stages Editable List */
        .task-stages {
            background-color: #f1f8ff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: left;
        }

        .task-stages ul {
            list-style: none;
            padding: 0;
        }

        .task-stages li {
            font-size: 18px;
            color: #333;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .task-stages input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .task-stages label {
            cursor: pointer;
        }

        .task-stages input[type="text"] {
            font-size: 16px;
            padding: 5px;
            margin-left: 10px;
            width: 70%;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .task-stages button {
            padding: 5px 10px;
            background-color: #2ecc71;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-left: 10px;
        }

        .task-stages button:hover {
            background-color: #27ae60;
        }

        /* Status Input */
        .status-input {
            margin-top: 15px;
        }

        .status-input input {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 8px;
        }

        .save-status-btn {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #f39c12;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
        }

        .save-status-btn:hover {
            background-color: #e67e22;
        }

        /* Status Display */
        .status-display {
            margin-top: 10px;
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }

        .status-text {
            margin-left: 10px;
            font-size: 18px;
            color: #333;
        }

        /* Button Styles */
        .btn {
            padding: 15px 25px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #2ecc71;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }

        .icon-btn i {
            font-size: 20px;
        }

        .task-actions a, .task-actions button {
            width: 100%;
            max-width: 250px;
            margin: 10px;
        }

        /* Styling for back button */
        .back-btn {
            font-size: 18px;
            font-weight: bold;
        }

        .back-btn i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Detail Tugas: {{ $task->name }}</h1>

        <div class="task-info">
            <p><strong>Deskripsi:</strong> {{ $task->description }}</p>
            <p><strong>Batas Waktu:</strong> {{ $task->deadline }}</p>

            <!-- Status Input Field -->
            <div class="status-input">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="{{ $task->status }}" placeholder="Tulis status tugas di sini">
                <button class="save-status-btn" onclick="saveStatus()">Simpan Status</button>
                <!-- Display the saved status next to the input -->
                <span id="status-text" class="status-text"></span>
            </div>
        </div>

        <!-- Task Stages List (User Editable) -->
        <div class="task-stages">
            <h3>Langkah-Langkah untuk Menyelesaikan Tugas:</h3>
            <ul id="stages-list">
                <!-- Tahapan Tugas yang ditambahkan oleh pengguna akan muncul di sini -->
            </ul>

            <input type="text" id="new-stage" placeholder="Masukkan tahapan baru">
            <button onclick="addStage()">Tambah Tahapan</button>
        </div>

        <div class="task-actions">
            <!-- Edit Task Button -->
            <a href="{{ route('tasks.edit', ['project' => $project->id, 'task' => $task->id]) }}" class="btn btn-primary">
                <div class="icon-btn">
                    <i class="fas fa-edit"></i> Edit Tugas
                </div>
            </a>

            <!-- Delete Task Button -->
            <form action="{{ route('tasks.destroy', ['project' => $project->id, 'task' => $task->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                    <div class="icon-btn">
                        <i class="fas fa-trash-alt"></i> Hapus Tugas
                    </div>
                </button>
            </form>

            <!-- Back to Task List Button -->
            <a href="{{ route('tasks.index', $project->id) }}" class="btn btn-secondary back-btn">
                <div class="icon-btn">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Tugas
                </div>
            </a>
        </div>
    </div>


    <script>
        // Save the status to localStorage and display it next to the input
        function saveStatus() {
            const status = document.getElementById('status').value;
            if (status) {
                // Save status in localStorage
                localStorage.setItem('taskStatus', status);
                
                // Display the saved status next to the input
                document.getElementById('status-text').innerText = "Status Disimpan: " + status;
                alert('Status berhasil disimpan sementara!');
            }
        }

        // Function to add a new task stage dynamically
        function addStage() {
            const stageInput = document.getElementById('new-stage');
            const stageText = stageInput.value.trim();
            if (stageText !== "") {
                const ul = document.getElementById('stages-list');
                const li = document.createElement('li');

                // Create checkbox and label for the new stage
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.id = `stage-${ul.children.length + 1}`;

                const label = document.createElement('label');
                label.setAttribute('for', checkbox.id);
                label.textContent = stageText;

                li.appendChild(checkbox);
                li.appendChild(label);
                ul.appendChild(li);

                stageInput.value = ''; // Reset the input after adding the stage
            }
        }
    </script>
</body>
</html>
