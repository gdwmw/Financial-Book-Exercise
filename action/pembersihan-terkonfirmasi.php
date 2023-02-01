<?php
include('config.php');
$query01 = "UPDATE bulanan SET terpakai = 0";
$query02 = "DELETE FROM transaksi";
$query03 = "UPDATE bulanan SET terpakai='1250000' WHERE keterangan='*Jajan Dewi - Bulanan'";
$query04 = "UPDATE bulanan SET terpakai='372000' WHERE keterangan='*WiFi - Bulanan'";
$query05 = "UPDATE bulanan SET terpakai='250000' WHERE keterangan='*Air - Bulanan'";
$act01 = mysqli_query($conn, $query01);
$act02 = mysqli_query($conn, $query02);
$act03 = mysqli_query($conn, $query03);
$act04 = mysqli_query($conn, $query04);
$act05 = mysqli_query($conn, $query05);
header("Location: ../page/tambah.php");
mysqli_close($conn);
?>