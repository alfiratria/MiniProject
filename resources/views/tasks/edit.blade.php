<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #f0f0f0, #e0e0e0);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Centered container with shadow and rounded corners */
        .container {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            box-sizing: border-box;
            transition: transform 0.3s ease-in-out;
        }

        .container:hover {
            transform: translateY(-10px);
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #4e73df;
            margin-bottom: 25px;
            letter-spacing: 1px;
            font-family: 'Helvetica Neue', sans-serif;
        }

        /* Form and input styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        label {
            align-self: flex-start;
            font-weight: 600;
            font-size: 14px;
            color: #333;
            letter-spacing: 0.5px;
        }

        input, textarea {
            width: 100%;
            max-width: 480px;
            padding: 12px;
            margin: 8px 0;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.5);
            outline: none;
        }

        textarea {
            height: 120px;
            resize: none;
        }

        /* Submit button */
        button {
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            background-color: #3498db;
            color: white;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        /* Back and Submit buttons container */
        .btn-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }

        .btn-container a,
        .btn-container button {
            font-size: 16px;
            background-color: #2ecc71;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-container a:hover,
        .btn-container button:hover {
            background-color: #27ae60;
            transform: scale(1.05);
        }

        .btn-container i {
            font-size: 18px;
        }

        /* Status box styling */
        .status-box {
            background-color: #e9f7ff;
            padding: 15px;
            border-radius: 10px;
            border-left: 5px solid #4e73df;
            margin: 15px 0;
            text-align: left;
            font-size: 14px;
            color: #333;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
                max-width: 100%;
            }

            h1 {
                font-size: 24px;
            }

            input, textarea, button {
                max-width: 100%;
            }

            .btn-container {
                flex-direction: column;
                align-items: center;
            }

            .btn-container a,
            .btn-container button {
                width: 100%;
                max-width: 250px;
            }

            .back-btn {
                font-size: 14px;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Tugas: {{ $task->name }}</h1>

        <form action="{{ route('tasks.update', ['project' => $project->id, 'task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nama Tugas:</label>
            <input type="text" name="name" value="{{ old('name', $task->name) }}" required>

            <label for="description">Deskripsi:</label>
            <textarea name="description">{{ old('description', $task->description) }}</textarea>

            <label for="deadline">Batas Waktu:</label>
            <input type="date" name="deadline" value="{{ old('deadline', $task->deadline) }}">

            <div class="btn-container">
                <a href="{{ route('tasks.index', $project->id) }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Tugas
                </a>
                <button type="submit">Perbarui Tugas</button>
            </div>
        </form>
    </div>

</body>
</html>
