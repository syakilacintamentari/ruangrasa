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
     <title>Edit Menu</title>
 </head>

 </html>

 <body>

     <h1>Edit Menu</h1>

     <form action="update_menu.php" method="POST">

         <input
             type="hidden"
             name="id_menu"
             value="<?php echo $menu['id_menu']; ?>">

         <p>
             Nama Menu
             <br>
             <input
                 type="text"
                 name="nama_menu"
                 value="<?php echo $menu['nama_menu']; ?>">
         </p>

         <p>
             Kategori
             <br>
             <select name="kategori">
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
                     Cemilam
                 </option>
                 <option value="Dessert"
                     <?php if ($menu['kategori'] == "Dessert") echo "selected"; ?>>
                     Dessert
                 </option>
             </select>
         </p>
         <p>
             Deskripsi
             <br>

             <textarea
                 name="deskripsi"
                 rows="4"
                 cols="40"><?php echo $menu['deskripsi']; ?></textarea>
         </p>

         <p>
             Harga
             <br>

             <input
                 type="number"
                 name="harga"
                 value="<?php echo $menu['harga']; ?>"
                 required>
         </p>

         <button type="submit">
             Update Menu
         </button>
     </form>
     <br>

     <a href="data_menu.php">
         Kembali
     </a>
 </body>

 </html>