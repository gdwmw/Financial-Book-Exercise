<?php
// konfigurasi koneksi
$host = "localhost";
$user = "root";
$password = "";
$dbname = "pembukuan";

// buat koneksi
$conn = mysqli_connect($host, $user, $password, $dbname);

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>