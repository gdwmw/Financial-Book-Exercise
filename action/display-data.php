<?php
include('config.php');
$query = "SELECT * FROM transaksi ORDER BY tanggal ASC";
$result = mysqli_query($conn, $query);
$no = 1;
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<th scope='row'>" . $no . "</th>";
    echo "<td>" . $row['tanggal'] . "</td>";
    if ($row['warna'] === 'Biru') {
        echo "<td style='color: blue;'>" . "Rp " . number_format($row['jumlah'], 0, ",", ".") . "</td>";
    } elseif ($row['warna'] === 'Hijau') {
        echo "<td style='color: green;'>" . "Rp " . number_format($row['jumlah'], 0, ",", ".") . "</td>";
    } elseif ($row['warna'] === 'Merah') {
        echo "<td style='color: red;'>" . "Rp " . number_format($row['jumlah'], 0, ",", ".") . "</td>";
    } else {
        echo "<td>" . "Rp " . number_format($row['jumlah'], 0, ",", ".") . "</td>";
    }
    echo "<td><p class='mx-auto overflow-scroll'>" . $row['keterangan'] . "</p></td>";
    echo "<td>" . $row['tipe'] . "</td>";
    echo "<td>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "<a class='btn btn-secondary btn-sm mt-1' href='../action/tabel-ubah.php?id=" . $row['id'] . "'>Ubah</a> ";
    ?>
    <button type="submit" class="btn btn-danger btn-sm mt-1" name="hapus"
        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" ;>Hapus</button>
    <?php
    echo "</form>";
    echo "</td>";
    echo "</tr>";
    $no++;
}
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM transaksi WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "<script>
        document.location.href='tabel.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        document.location.href='tabel.php';
        </script>";
    }
}
mysqli_close($conn);
?>