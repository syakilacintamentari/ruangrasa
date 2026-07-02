<?php
session_start();

include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM users
    WHERE username='$username'
    AND password = '$password'"

);


$data = mysqli_num_rows($query);

if ($data > 0) {
    $_SESSION['login'] = true;

    header("Location: dashboard.php");
} else {
    echo "Username atau password salah";
}
