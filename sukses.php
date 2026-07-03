<!DOCTYPE html>
<html>

<head>
    <title>Pesanan Berhasil | Ruang Rasa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .success-card {
            max-width: 600px;
            margin: 80px auto;
            border: none;
            border-radius: 20px;
        }

        .icon {
            font-size: 80px;
        }

        .footer {
            margin-top: 60px;
            background: #212529;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="card success-card shadow">

            <div class="card-body text-center p-5">

                <div class="icon">
                    ✅
                </div>

                <h2 class="text-success fw-bold mt-3">
                    Pesanan Berhasil
                </h2>

                <p class="text-muted mt-3">
                    Terima kasih telah memesan di
                    <br>
                    <strong>Ruang Rasa Cafe & Resto</strong>
                </p>

                <p class="mb-4">
                    Nikmati Setiap Rasa,
                    <br>
                    Ciptakan Setiap Cerita
                </p>

                <a href="index.php"
                    class="btn btn-success px-4">
                    Kembali ke Menu
                </a>

            </div>

        </div>

    </div>

    <div class="footer">
        &copy; <?php echo date("Y"); ?> Ruang Rasa Cafe & Resto.
        <br>
        Nikmati Setiap Rasa, Ciptakan Setiap Cerita
    </div>

</body>

</html>