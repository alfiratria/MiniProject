<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek: {{ $project->name }}</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fb;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height for vertical centering */
        }
        .container {
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
        }
        h1 {
            font-size: 2.5em;
            color: #0069d9;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .project-info {
            margin-bottom: 30px;
        }
        .project-info p {
            font-size: 1.1em;
            margin-bottom: 10px;
        }
        .project-info strong {
            color: #555;
        }
        .task-status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 8px;
            display: inline-block;
        }
        .task-status.in-progress {
            background-color: #ffc107;
            color: white;
        }
        .task-status.completed {
            background-color: #28a745;
            color: white;
        }
        .progress-bar {
            width: 100%;
            background-color: #e9eff5;
            height: 8px;
            border-radius: 10px;
            margin-top: 10px;
        }
        .progress-bar-inner {
            height: 8px;
            border-radius: 10px;
            background-color: #007bff;
        }
        .project-description {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .project-description h2 {
            font-size: 1.8em;
            color: #333;
            margin-bottom: 10px;
        }
        .project-description p {
            font-size: 1.15em;
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            text-align: center;
        }
        .back-button:hover {
            background-color: #0056b3;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 2em;
            }
            .project-description h2, .project-info p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>{{ $project->name }}</h1>

        <div class="project-description">
            <h2>Deskripsi Proyek</h2>
            <p>{{ $project->description }}</p>
        </div>

        <div class="project-info">
            <p><strong>Batas Waktu:</strong> {{ $project->deadline }}</p>
            <p><strong>Status:</strong> <span class="task-status {{ strtolower($project->status) }}">{{ $project->status }}</span></p>
        </div>

        <a href="javascript:history.back()" class="back-button">Back</a>
    </div>

</body>
</html>
