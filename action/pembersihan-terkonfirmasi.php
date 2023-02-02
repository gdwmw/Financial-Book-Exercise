<?php
include('config.php');
$query01 = "UPDATE bulanan SET terpakai = 0";
$query02 = "DELETE FROM transaksi";
$act01 = mysqli_query($conn, $query01);
$act02 = mysqli_query($conn, $query02);
header("Location: ../page/tambah.php");
mysqli_close($conn);
?>