<?php

session_start();

include 'config/koneksi.php';

$total = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Keranjang | Ruang Rasa</title>

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
            <a class="navbar-brand fw-bold" href="index.php">
                Ruang Rasa
            </a>

            <a href="index.php" class="btn btn-light">
                Kembali Belanja
            </a>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    🛒 Keranjang Belanja
                </h4>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th width="180">Qty</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0) {

                            foreach ($_SESSION['keranjang'] as $id => $qty) {

                                $query = mysqli_query(
                                    $koneksi,
                                    "SELECT * FROM menu WHERE id_menu='$id'"
                                );

                                $data = mysqli_fetch_assoc($query);

                                if (!$data) {
                                    continue;
                                }

                                $subtotal = $data['harga'] * $qty;
                                $total += $subtotal;

                        ?>

                                <tr>

                                    <td>
                                        <?php echo $data['nama_menu']; ?>
                                    </td>

                                    <td>
                                        Rp <?php echo number_format($data['harga'], 0, ",", "."); ?>
                                    </td>

                                    <td class="text-center">

                                        <a href="kurang_qty.php?id=<?php echo $id; ?>"
                                            class="btn btn-danger btn-sm">
                                            -
                                        </a>

                                        <span class="mx-3 fw-bold">
                                            <?php echo $qty; ?>
                                        </span>

                                        <a href="tambah_qty.php?id=<?php echo $id; ?>"
                                            class="btn btn-success btn-sm">
                                            +
                                        </a>

                                    </td>

                                    <td>
                                        Rp <?php echo number_format($subtotal, 0, ",", "."); ?>
                                    </td>

                                    <td class="text-center">

                                        <a
                                            href="hapus_keranjang.php?id=<?php echo $id; ?>"
                                            class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Hapus menu ini?')">

                                            🗑️

                                        </a>

                                    </td>

                                </tr>

                            <?php
                            }
                        } else {
                            ?>

                            <tr>
                                <td colspan="5" class="text-center">
                                    Keranjang masih kosong.
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                    <tfoot>

                        <tr>

                            <th colspan="3" class="text-end">
                                Total
                            </th>

                            <th colspan="2">
                                Rp <?php echo number_format($total, 0, ",", "."); ?>
                            </th>

                        </tr>

                    </tfoot>

                </table>

                <hr>

                <h4 class="mb-4">
                    Checkout
                </h4>

                <form action="checkout.php" method="POST">

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Pelanggan
                        </label>

                        <input
                            type="text"
                            name="nama_pelanggan"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Nomor Meja
                        </label>

                        <input
                            type="text"
                            name="nomor_meja"
                            class="form-control"
                            required>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-success">

                        Pesan Sekarang

                    </button>

                </form>

            </div>

        </div>

    </div>

    <div class="footer">
        &copy; <?php echo date("Y"); ?> Ruang Rasa Cafe & Resto
        <br>
        Nikmati Setiap Rasa, Ciptakan Setiap Cerita
    </div>

</body>

</html>