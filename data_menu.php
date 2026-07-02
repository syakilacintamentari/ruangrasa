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
</head>

<body>
    <h1>Data Menu Ruang Rasa</h1>

    <a href="dashboard.php">
        Kembali ke Dashboard
    </a>
    |

    <a href="tambah_menu.php">
        Tambah Menu</a>

    <br><br>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Nama Menu</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php while ($menu = mysqli_fetch_assoc($data)) { ?>


            <tr>
                <td><?php echo $menu['id_menu']; ?>
                </td>
                <td><?php echo $menu['nama_menu']; ?>
                </td>
                <td><?php echo $menu['kategori']; ?>
                </td>
                <td>
                    Rp<?php echo number_format($menu['harga']); ?>
                </td>

                <td>
                    <a href="edit_menu.php?id=<?php echo $menu['id_menu']; ?>">
                        Edit
                    </a>

                    |

                    <a href="hapus_menu.php?id=<?php echo $menu['id_menu']; ?>"
                        onclick="return confirm('Yakin ingin menghapus menu ini?')">
                        Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>