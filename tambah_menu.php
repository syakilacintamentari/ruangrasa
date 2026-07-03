<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Tambah Menu | Ruang Rasa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .card {
            border: none;
            border-radius: 18px;
        }

        .form-control,
        .form-select {
            height: 50px;
        }

        textarea.form-control {
            height: 120px;
        }

        .footer {
            margin-top: 50px;
            background: #212529;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="dashboard.php">
                Ruang Rasa Admin
            </a>

            <a
                href="data_menu.php"
                class="btn btn-light">
                Data Menu
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    Tambah Menu Baru
                </h4>
            </div>

            <div class="card-body">

                <form action="simpan_menu.php"
                    method="POST"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">
                            Nama Menu
                        </label>
                        <input type="text"
                            name="nama_menu"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Kategori
                        </label>

                        <select
                            name="kategori"
                            class="form-select"
                            required>
                            <option value="">Pilih Kategori</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Cemilan">Cemilan</option>
                            <option value="Dessert">Dessert</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Harga
                        </label>

                        <input
                            type="number"
                            name="harga"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Foto Menu
                        </label>
                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept="image/*">
                    </div>

                    <button
                        type="submit"
                        class="btn btn-success">
                        Simpan Menu
                    </button>

                    <a
                        href="data_menu.php"
                        class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
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