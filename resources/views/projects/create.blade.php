<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek</title>
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
            width: 100px;
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
        <h1>Tambah Proyek</h1>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2a10 10 0 11-6.325 17.843L4.414 22l1.513-1.514A10 10 0 0112 2zM5.7 18.3a8 8 0 101.4-1.4L4 20.3l1.7-2zM11 7a1 1 0 011-1h4a1 1 0 110 2h-4a1 1 0 01-1-1zM9 11a1 1 0 011-1h6a1 1 0 110 2H10a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H10z"/>
                </svg>
                <label for="name">Nama Proyek:</label>
                <input type="text" id="name" name="name" placeholder="Nama Proyek" required>
            </div>
            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm1 1v14h16V5H4z"/>
                </svg>
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" placeholder="Deskripsi Proyek" rows="4"></textarea>
            </div>
            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6 2a1 1 0 011 1v1h10V3a1 1 0 112 0v1a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6a3 3 0 013-3V3a1 1 0 011-1zm0 6a1 1 0 011 1v8a1 1 0 11-2 0V9a1 1 0 011-1zm12 0a1 1 0 011 1v8a1 1 0 11-2 0V9a1 1 0 011-1zm-8 6a1 1 0 100 2h4a1 1 0 100-2h-4z"/>
                </svg>
                <label for="deadline">Batas Waktu:</label>
                <input type="date" id="deadline" name="deadline" required>
            </div>
            <div class="button-group">
                <button type="submit">Simpan Proyek</button>
                <button type="button" class="back-button" onclick="window.history.back();">Kembali</button>
            </div>
        </form>
    </div>

</body>
</html>
