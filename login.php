<!DOCTYPE html>
<html>

<head>
    <title>Login Admin | Ruang Rasa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #198754, #d1e7dd);
            min-height: 100vh;
        }

        .login-card {
            max-width: 420px;
            margin: 70px auto;
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .logo {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            padding: 6px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-success {
            border-radius: 10px;
        }

        .form-control {
            height: 50px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="card login-card shadow">

            <div class="card-body p-5">

                <div class="text-center">

                    <img src="assets/images/logo.jpeg" class="logo mb-3" alt="Logo">

                    <h2 class="fw-bold text-success">
                        RUANG RASA
                    </h2>

                    <p class="text-muted">
                        Cafe & Resto
                    </p>

                    <hr>

                    <h4 class="mb-4">
                        Login Admin
                    </h4>

                </div>

                <form action="cek_login.php" method="POST" autocomplete="off">

                    <div class="mb-3">

                        <label class="form-label">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Masukkan Username"
                            autocomplete="off"
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan Password"
                            autocomplete="new-password"
                            required>

                    </div>

                    <button
                        type="submit"
                        name="login"
                        class="btn btn-success w-100">

                        Login

                    </button>

                </form>

                <div class="text-center mt-4">

                    <a href="index.php" class="text-decoration-none text-success">
                        ← Kembali ke Beranda
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>