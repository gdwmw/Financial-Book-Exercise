<?php
include('config.php');
$query = "SELECT SUM(jumlah) as total_masuk FROM transaksi WHERE tipe='Masuk'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$total_masuk = $row['total_masuk'];
$query = "SELECT SUM(jumlah) as total_keluar FROM transaksi WHERE tipe='Keluar'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$total_keluar = $row['total_keluar'];
$saldo = ($_SESSION['sisa'] + $total_masuk) - $total_keluar;
echo "<tr>";
if ($_SESSION['sisa'] > 500000) {
    echo "<td style='color: green;'>Rp " . number_format($_SESSION['sisa'], 0, ",", ".") . "</td>";
} elseif ($_SESSION['sisa'] < 500000 && $_SESSION['sisa'] >= 0) {
    echo "<td style='color: orange;'>Rp " . number_format($_SESSION['sisa'], 0, ",", ".") . "</td>";
} else {
    echo "<td style='color: red;'>Rp " . number_format($_SESSION['sisa'], 0, ",", ".") . "</td>";
}
echo "<td>Rp " . number_format($total_masuk, 0, ",", ".") . "</td>";
echo "<td>Rp " . number_format($total_keluar, 0, ",", ".") . "</td>";
if ($saldo > 500000) {
    echo "<td style='color: green;'>Rp " . number_format($saldo, 0, ",", ".") . "</td>";
} elseif ($saldo < 500000 && $saldo >= 0) {
    echo "<td style='color: orange;'>Rp " . number_format($saldo, 0, ",", ".") . "</td>";
} else {
    echo "<td style='color: red;'>Rp " . number_format($saldo, 0, ",", ".") . "</td>";
}
echo "</tr>";
mysqli_close($conn);
?>