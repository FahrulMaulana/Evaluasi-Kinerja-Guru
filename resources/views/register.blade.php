<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background: #6e8efb;
            border: none;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background: #a777e3;
        }
        .form-label {
            font-weight: bold;
            padding-left: 30px;
        }
        .text-center a {
            color: #6e8efb;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .alerts {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 500px;
            z-index: 1050;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
      <!-- Alert Section -->
      <div class="alerts">
        @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="card shadow-lg p-4" style="width: 400px;">
        <h3 class="text-center mb-4 text-primary">Register</h3>
        <!-- Form action diperbaiki -->
        <form action="{{ route('postRegister') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter your nama" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="bi bi-lock"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="text-center mt-3">
            <small>Sudah punya akun? <a href="{{ route('login') }}">Login</a></small>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js">
          setTimeout(function() {
        var errorAlert = document.getElementById('error-alert');
        var successAlert = document.getElementById('success-alert');
        
        // Cek apakah ada error alert dan trigger event close
        if (errorAlert) {
            var closeButton = errorAlert.querySelector('[data-bs-dismiss="alert"]');
            if (closeButton) {
                closeButton.click(); // Men-trigger klik pada tombol close
            }
        }

        // Cek apakah ada success alert dan trigger event close
        if (successAlert) {
            var closeButton = successAlert.querySelector('[data-bs-dismiss="alert"]');
            if (closeButton) {
                closeButton.click(); // Men-trigger klik pada tombol close
            }
        }
    }, 3000); // 3000ms = 3 seconds
    </script>
</body>
</html>
