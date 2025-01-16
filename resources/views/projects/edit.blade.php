<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fb;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #007bff;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            font-family: 'Poppins', sans-serif;
            outline: none;
        }
        .form-group textarea {
            resize: none;
        }
        .form-group label {
            display: none;
        }
        .form-group svg {
            width: 24px;
            height: 24px;
            color: #007bff;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 15px;
            font-size: 1em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 120px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-button {
            background-color: #6c757d;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Edit Proyek: {{ $project->name }}</h1>
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <label for="name">Nama Proyek:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}" placeholder="Nama Proyek" required>
            </div>
            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4z" />
                </svg>
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" placeholder="Deskripsi Proyek">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                </svg>
                <label for="deadline">Batas Waktu:</label>
                <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $project->deadline) }}" required>
            </div>
            <div class="button-group">
                <button type="submit">Perbarui Proyek</button>
                <button type="button" class="back-button" onclick="window.history.back();">Kembali</button>
            </div>
        </form>
    </div>

</body>
</html>
