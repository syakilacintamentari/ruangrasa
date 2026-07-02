<?php

session_start();

include 'config/koneksi.php';

$total = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Keranjang</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">
            🛒Keranjang Belanja
        </h2>
        <table class="table table-bordered">
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>

            <?php

            if (isset($_SESSION['keranjang'])) {
                foreach ($_SESSION['keranjang'] as $id => $qty) {
                    $query = mysqli_query(

                        $koneksi,
                        "SELECT * FROM menu WHERE id_menu = '$id'"
                    );

                    $data = mysqli_fetch_assoc($query);
                    if (!$data) {
                        continue;
                    }
                    $subtotal = $data['harga'] * $qty;
                    $total += $subtotal;
            ?>

                    <tr>
                        <td><?php echo $data['nama_menu']; ?></td>

                        <td>
                            Rp <?php echo number_format($data['harga']); ?>
                        </td>

                        <td><?php echo $qty; ?></td>

                        <td>
                            Rp <?php echo number_format($subtotal); ?>
                        </td>
                    </tr>
            <?php

                }
            }
            ?>

            <tr>
                <th colspan="3">Total</th>

                <th>
                    Rp<?php echo number_format($total); ?>

                </th>
            </tr>

        </table>

        <a href="index.php"
            class="btn btn-secondary">
            Kembali</a>

        <hr>

        <h3>Checkout</h3>

        <form action="checkout.php" method="POST">
            <div class="mb-3">
                <label>Nama Pelanggan</label>
                <input type="text"
                    name="nama_pelanggan"
                    class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label>Nomor Meja</label>
                <input type="text"
                    name="nomor_meja"
                    class="form-control"
                    required>
            </div>


            <button type="submit"
                class="btn btn-success">
                Pesan Sekarang
            </button>
        </form>
    </div>
</body>

</html>