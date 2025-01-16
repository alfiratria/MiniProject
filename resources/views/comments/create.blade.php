<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Komentar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
            font-weight: 600;
        }
        textarea {
            width: 100%;
            height: 150px;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            resize: vertical;
            margin-bottom: 20px;
            outline: none;
        }
        textarea:focus {
            border-color: #007bff;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            flex-basis: 48%;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button i {
            margin-right: 8px;
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

    <div class="container">
        <h1>Tambah Komentar untuk {{ $task->name }}</h1>

        <form action="{{ route('comments.store', ['project' => $project->id, 'task' => $task->id]) }}" method="POST">
            @csrf
            <textarea name="comment" required placeholder="Tulis komentar Anda di sini..."></textarea>
            
            <div class="button-container">
                <button type="submit" class="button">
                    <i class="icon">💬</i> Kirim Komentar
                </button>
                <a href="{{ route('comments.index', ['project' => $project->id, 'task' => $task->id]) }}" class="button back-button">
                    <i class="icon">⬅️</i> Kembali ke Daftar Komentar
                </a>
            </div>
        </form>
    </div>

</body>
</html>
