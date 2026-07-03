<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM menu ORDER BY id_menu DESC"
);

?>

<!DOCTYPE html>

<html>

<head>
    <title>Data Menu</title>
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

        .table th {
            background: white;
            color: #198754;
            border-bottom: 3px solid #198754;
            font-weight: bold;
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

            <a href="dashboard.php" class="btn btn-light">
                Dashboard
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

                <h4 class="mb-0">
                    Data Menu
                </h4>

                <a href="tambah_menu.php"
                    class="btn btn-light">
                    + Tambah Menu
                </a>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($menu = mysqli_fetch_assoc($data)) { ?>
                            <tr>
                                <td><?php echo $menu['id_menu']; ?></td>

                                <td width="100">
                                    <?php
                                    if (!empty($menu['foto'])) {
                                    ?>
                                        <img src="assets/images/<?php echo $menu['foto']; ?>"
                                            width="70"
                                            class="rounded">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="assets/images/logo.jpeg"
                                            width="70"
                                            class="rounded">
                                    <?php } ?>
                                </td>

                                <td>
                                    <?php echo $menu['nama_menu']; ?>

                                </td>

                                <td>
                                    <span class="badge bg-success">

                                        <?php echo $menu['kategori']; ?>
                                    </span>
                                </td>

                                <td>
                                    Rp<?php echo number_format($menu['harga'], 0, ",", "."); ?>
                                </td>

                                <td>
                                    <a href="edit_menu.php?id=<?php echo $menu['id_menu']; ?>"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <a href="hapus_menu.php?id=<?php echo $menu['id_menu']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                        Hapus
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> Ruang Rasa Cafe & Resto. All rights reserved.
    </div>
</body>

</html>