<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for {{ $project->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }
        h1 {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #007bff;
            text-align: center; /* Menempatkan judul di tengah */
        }
        .button-group {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between; /* Membuat tombol terpisah */
            gap: 20px;
        }
        .button {
            display: inline-flex;
            align-items: center;
            background-color: #007bff;
            color: white;
            padding: 15px 25px;
            font-size: 1em;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .back-button {
            background-color: #6c757d;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
        .task-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .task-card {
            background-color: #f1f3f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .task-header {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #007bff;
            display: flex;
            align-items: center;
        }
        .task-header img {
            margin-right: 10px;
        }
        .task-progress {
            width: 100%;
            height: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
            margin: 10px 0;
        }
        .progress-bar {
            height: 100%;
            background-color: #007bff;
            width: 0;
            transition: width 0.3s ease;
        }
        .task-actions {
            margin-top: auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        select {
            padding: 5px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }
        a:hover {
            color: #0056b3;
        }
        .icon {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }
        /* Tombol comment baru */
        .comment-button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            font-size: 1em;
            border: none;
            border-radius: 25px; /* Membuat tombol lebih bulat */
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: auto; /* Menyesuaikan lebar tombol */
            margin-top: 15px; /* Memberikan jarak lebih */
            text-align: center;
        }
        .comment-button:hover {
            background-color: #218838;
        }
        .comment-button .icon {
            margin-right: 10px;
        }
        /* Ikon edit dan delete */
        .action-buttons a {
            display: inline-flex;
            align-items: center;
        }
        .action-buttons .icon {
            width: 18px;
            height: 18px;
            margin-right: 8px;
        }
        .edit-button, .delete-button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .edit-button:hover, .delete-button:hover {
            background-color: #0056b3;
        }
        .edit-button .icon, .delete-button .icon {
            margin-right: 6px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Tasks for {{ $project->name }}</h1>
        <div class="button-group">
            <!-- Tombol Back di sebelah kiri, Add Task di sebelah kanan -->
            <a href="#" class="button back-button" onclick="window.history.back();">
                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/left.png" alt="Back" class="icon"> Back
            </a>
            <a href="{{ route('tasks.create', $project->id) }}" class="button">
                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/add.png" alt="Add" class="icon"> Add Task
            </a>
        </div>
        <div class="task-list">
            @foreach($tasks as $task)
                <div class="task-card">
                    <div class="task-header">
                        <img src="https://img.icons8.com/ios-glyphs/30/007bff/task.png" alt="Task" class="icon">
                        <a href="{{ route('tasks.show', ['project' => $project->id, 'task' => $task->id]) }}">
                            {{ $task->name }}
                        </a>
                    </div>
                    <div class="task-progress">
                        <div class="progress-bar" style="width: {{ $task->progress }}%;"></div>
                    </div>
                    <div class="task-actions">
                        <select onchange="updateProgress(this)">
                            <option value="0" {{ $task->progress == 0 ? 'selected' : '' }}>Not Started</option>
                            <option value="25" {{ $task->progress == 25 ? 'selected' : '' }}>In Progress</option>
                            <option value="50" {{ $task->progress == 50 ? 'selected' : '' }}>Halfway</option>
                            <option value="75" {{ $task->progress == 75 ? 'selected' : '' }}>Almost Done</option>
                            <option value="100" {{ $task->progress == 100 ? 'selected' : '' }}>Completed</option>
                        </select>
                        <div class="action-buttons">
                            <!-- Tombol edit dan delete lebih terlihat -->
                            <a href="{{ route('tasks.edit', ['project' => $project->id, 'task' => $task->id]) }}" class="edit-button">
                                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/edit.png" alt="Edit" class="icon"> Edit
                            </a>
                            <a href="{{ route('tasks.destroy', ['project' => $project->id, 'task' => $task->id]) }}" class="delete-button" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this task?')) { document.getElementById('delete-form-{{ $task->id }}').submit(); }">
                                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/delete-sign.png" alt="Delete" class="icon"> Delete
                            </a>
                            <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', ['project' => $project->id, 'task' => $task->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('comments.index', ['project' => $project->id, 'task' => $task->id]) }}" class="comment-button">
                        <img src="https://img.icons8.com/ios-glyphs/30/ffffff/comments.png" alt="Comments" class="icon">
                        View Comments
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function updateProgress(selectElement) {
            const progress = selectElement.value;
            const progressBar = selectElement.closest('.task-card').querySelector('.progress-bar');
            progressBar.style.width = progress + '%';
        }
    </script>

</body>
</html>
