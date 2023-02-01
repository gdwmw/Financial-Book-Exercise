<?php
include('config.php');
$query = "SELECT * FROM bulanan";
$result = mysqli_query($conn, $query);
$no = 1;
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['keterangan'] . "</td>";
    $iterpakai = $row['terpakai'];
    $ianggaran = $row['anggaran'];
    if ($iterpakai < $ianggaran) {
        echo "<td style='color: green;'>Rp " . number_format($row['anggaran'], 0, ",", ".") . "</td>";
    } elseif ($iterpakai > $ianggaran) {
        echo "<td style='color: red;'>Rp " . number_format($row['anggaran'], 0, ",", ".") . "</td>";
    } else {
        echo "<td>Rp " . number_format($row['anggaran'], 0, ",", ".") . "</td>";
    }
    echo "<td>Rp " . number_format($row['terpakai'], 0, ",", ".") . "</td>";
    echo "<td>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "<a class='btn btn-secondary btn-sm mt-1' href='../action/bulanan-ubah.php?id=" . $row['id'] . "'>Ubah</a> ";
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
    $query = "DELETE FROM bulanan WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "<script>
        document.location.href='../page/bulanan.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        document.location.href='../page/bulanan.php';
        </script>";
    }
}
if (isset($_POST['submit'])) {
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $anggaran = htmlspecialchars($_POST['anggaran']);
    $terpakai = "0";
    $query = "INSERT INTO bulanan (keterangan, anggaran, terpakai) VALUES ('$keterangan', '$anggaran', '$terpakai')";
    if (mysqli_query($conn, $query)) {
        echo "<script>
                document.location.href='../page/bulanan.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal disimpan!');
                document.location.href='../page/bulanan.php';
                </script>";
    }
}
mysqli_close($conn);
?>