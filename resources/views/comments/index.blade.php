<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komentar untuk Tugas: {{ $task->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 20px;
            flex-grow: 1;
        }
        ul li {
            background-color: #f1f1f1;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        ul li form {
            display: inline;
        }
        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            font-size: 1.2em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button i {
            margin-right: 8px;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .back-button {
            background-color: #6c757d;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #5a6268;
        }

        /* Position the buttons */
        .add-comment-button {
            align-self: flex-end;
            margin-top: 20px;
        }

        .back-button {
            align-self: flex-start;
        }

        /* Add the Respond button */
        .respond-button {
            background-color: #28a745;
            margin-left: 10px;
        }

        /* Ensure buttons are aligned to the right */
        .button-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
        }

        /* Footer container for buttons */
        .buttons-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            margin-bottom: 0;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Komentar untuk Tugas: {{ $task->name }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul>
            @foreach($comments as $comment)
                <li>
                    <span>{{ $comment->comment }}</span>
                    <div class="button-container">
                        <!-- Respond Button with Person Icon -->
                        <a href="#" class="button respond-button">
                            <i class="icon">👤</i> Respond
                        </a>

                        <form action="{{ route('comments.destroy', ['project' => $project->id, 'task' => $task->id, 'comment' => $comment->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button delete-button">
                                <i class="icon">🗑️</i> Hapus
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- Footer containing the buttons -->
        <div class="buttons-footer">
            <a href="{{ route('tasks.index', $project->id) }}" class="button back-button">
                <i class="icon">⬅️</i> Kembali ke Daftar Tugas
            </a>

            <a href="{{ route('comments.create', ['project' => $project->id, 'task' => $task->id]) }}" class="button add-comment-button">
                <i class="icon">✏️</i> Tambah Komentar
            </a>
        </div>
    </div>

</body>
</html>
