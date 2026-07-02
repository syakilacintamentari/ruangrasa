<?php

session_start();

include 'config/koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ruang Rasa Cafe & Resto</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                Ruang Rasa
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Menu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="keranjang.php">Keranjang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="bg-success text-white text-center py-5 shadow">
        <h1 class="display-4 fw-bold">
            RUANG RASA
        </h1>

        <p class="lead">
            Nikmati Setiap Rasa,
            Ciptakan Setiap Cerita
        </p>
    </div>

    <div class="container my-5">
        <h2>Daftar Menu</h2>

        <div class="row">
            <?php while ($menu = mysqli_fetch_array($data)) { ?>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow border-0">
                        <img src="foto/<?php echo $menu['foto']; ?>"
                            class="card-img-top"
                            style="height: 220px; object-fit:cover;">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">
                                <?php echo $menu['nama_menu']; ?>
                            </h4>

                            <span class="badge bg-success"><?php echo $menu['kategori']; ?></span>

                            <p class="mt-3">
                                <?php echo $menu['deskripsi']; ?>
                            </p>

                            <h5 class="text-success fw-bold">
                                Rp<?php echo number_format($menu['harga'], 0, ",", "."); ?>
                            </h5>

                            <a href="tambah_keranjang.php?id=<?php echo $menu['id_menu']; ?>"
                                class="btn btn-success fw-bold w-100">
                                Tambah ke Keranjang
                            </a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <footer class="bg-dark text-white text-center p-3 mt-5">
        2026 Ruang Rasa Cafe & Resto
        <br>
        Nikmati Setiap Rasa, Ciptakan Setiap Cerita
    </footer>
</body>

</html>