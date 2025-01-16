<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Mini Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #e6f2ff;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            height: 600px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.2);
            flex-wrap: wrap;
            margin: 0;
        }
        .left-content {
            flex: 1 1 50%;
            background-image: url('telfood.jpeg'); /* Ganti dengan path gambar yang sesuai */
            background-size:  cover;
            background-position: center;
            opacity: 100%;
            filter: brightness(100%);
            transition: all 0.3s ease;
            min-height: 100%;
            margin: 0;
            padding: 0; 
        }

        .left-content img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Gambar akan mengisi kontainer tanpa merusak proporsi */
        }

        .left-content:hover {
            opacity: 1;
            filter: brightness(100%);
        }
        .right-content {
            flex: 1 1 50%;
            background-color: #ffffff;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-left: 2px solid #007bff;
            min-height: 100%;
        }
        .right-content h2 {
            text-align: center;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
            font-size: 2rem;
        }
        .form-control {
            border-radius: 10px;
            box-shadow: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 10px;
            padding: 12px;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-3px);
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #007bff;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .alert {
            font-size: 1rem;
            margin-bottom: 20px;
        }
        footer {
            text-align: center;
            padding: 15px;
            background-color: #fff;
            font-size: 0.9rem;
            color: #555;
            border-top: 1px solid #ddd;
            width: 100%;
            position: absolute;
            bottom: 0;
        }
        footer a {
            color: #007bff;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            .left-content, .right-content {
                min-height: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Content (Image) -->
        <div class="left-content"></div>

        <!-- Right Content (Register Form) -->
        <div class="right-content">
            <h2>Register to Mini Project</h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Register Form -->
            <form action="{{ url('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Full Name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Create a password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <p class="login-link">Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
