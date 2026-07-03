<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM menu WHERE id_menu='$id'"
);

$menu = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Menu | Ruang Rasa</title>

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

        .preview-img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
        <div class="container">

            <a class="navbar-brand fw-bold" href="dashboard.php">
                Ruang Rasa Admin
            </a>

            <a href="data_menu.php" class="btn btn-light">
                Data Menu
            </a>

        </div>
    </nav>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    Edit Menu
                </h4>
            </div>

            <div class="card-body">

                <form
                    action="update_menu.php"
                    method="POST"
                    enctype="multipart/form-data">

                    <input
                        type="hidden"
                        name="id_menu"
                        value="<?php echo $menu['id_menu']; ?>">

                    <div class="mb-3">
                        <label class="form-label">
                            Nama Menu
                        </label>

                        <input
                            type="text"
                            name="nama_menu"
                            class="form-control"
                            value="<?php echo $menu['nama_menu']; ?>"
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

                            <option value="Minuman"
                                <?php if ($menu['kategori'] == "Minuman") echo "selected"; ?>>
                                Minuman
                            </option>

                            <option value="Makanan"
                                <?php if ($menu['kategori'] == "Makanan") echo "selected"; ?>>
                                Makanan
                            </option>

                            <option value="Cemilan"
                                <?php if ($menu['kategori'] == "Cemilan") echo "selected"; ?>>
                                Cemilan
                            </option>

                            <option value="Dessert"
                                <?php if ($menu['kategori'] == "Dessert") echo "selected"; ?>>
                                Dessert
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            required><?php echo $menu['deskripsi']; ?></textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Harga
                        </label>

                        <input
                            type="number"
                            name="harga"
                            class="form-control"
                            value="<?php echo $menu['harga']; ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Foto Saat Ini
                        </label>

                        <br>

                        <?php
                        if (!empty($menu['foto'])) {
                        ?>

                            <img
                                src="assets/images/<?php echo $menu['foto']; ?>"
                                class="preview-img shadow">

                        <?php
                        } else {
                        ?>

                            <img
                                src="assets/images/logo.jpeg"
                                class="preview-img shadow">

                        <?php
                        }
                        ?>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Ganti Foto
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
                        Update Menu
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