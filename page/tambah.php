<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../icon.ico">
    <title>Pembukuan - [Tambah]</title>
</head>

<body style="background-color:grey">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs text-center">
                                <li class="nav-item"><a class="nav-link active">Tambah</a></li>
                                <li class="nav-item"><a class="nav-link" href="bulanan.php">Bulanan</a></li>
                                <li class="nav-item"><a class="nav-link" href="tabel.php">Tabel</a></li>
                                <li class="nav-item"><a class="nav-link" href="ekspor.php">Ekspor</a></li>
                            </ul>
                        </div>
                        <script>
                            $(document).ready(function () {
                                var e = new Date();
                                var f = String(e.getDate()).padStart(2, "0");
                                var h = String(e.getMonth() + 1).padStart(2, "0");
                                var g = e.getFullYear();
                                e = g + "-" + h + "-" + f;
                                $("#date").val(e)
                            });
                        </script>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal :</label>
                                    <input id="date" type="date" class="form-control" name="tanggal" required>
                                </div>
                                <label for="jumlah" class="form-label">Jumlah :</label>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="jumlah" class="form-control" placeholder="Tulis jumlah.."
                                        value="000" required>
                                </div>
                                <select class="form-select mb-3" name="warna" required>
                                    <option value="Hitam">Hitam</option>
                                    <option value="Biru">Biru</option>
                                    <option value="Hijau">Hijau</option>
                                    <option value="Merah">Merah</option>
                                </select>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan :</label>
                                    <textarea class="form-control" rows="3" name="keterangan"
                                        placeholder="Tulis Keterangan.." required></textarea>
                                </div>
                                <label for="tipe" class="form-label">Tipe :</label>
                                <div class="input-group mb-3">
                                    <select class="form-select" name="tipe" required>
                                        <option value="Keluar">Keluar</option>
                                        <option value="Masuk">Masuk</option>
                                        <option value="WiFi">WiFi</option>
                                        <option value="Listrik">Listrik</option>
                                        <option value="Gas">Gas</option>
                                        <option value="Beras">Beras</option>
                                        <option value="Griya">Griya</option>
                                        <option value="Belanja Mingguan">Belanja Mingguan</option>
                                        <option value="Aqua Galon">Aqua Galon</option>
                                        <option value="Aqua Cup">Aqua Cup</option>
                                    </select>
                                </div> <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
include('../action/config.php');
if (isset($_POST['submit'])) {
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $warna = $_POST['warna'];
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $tipe = $_POST['tipe'];
    $query01 = "INSERT INTO transaksi (tanggal, jumlah, warna, keterangan, tipe) VALUES ('$tanggal', '$jumlah', '$warna','$keterangan', '$tipe')";
    if (!mysqli_query($conn, $query01)) {
        echo "<script>
                alert('Data gagal disimpan!');
                document.location.href='tambah.php';
                </script>";
    }
    if ($tipe === 'Keluar') {
        echo "<script>
        document.location.href='tambah.php';
        </script>";
    } elseif ($tipe === 'Masuk') {
        echo "<script>
        document.location.href='tambah.php';
        </script>";
    } else {
        $query02 = "SELECT SUM(jumlah) as total_jumlah FROM transaksi WHERE tipe='$tipe'";
        $result = mysqli_query($conn, $query02);
        $row = mysqli_fetch_array($result);
        $terpakai = $row['total_jumlah'];
        $query03 = "UPDATE bulanan SET terpakai='$terpakai' WHERE tipe='$tipe'";
        if (mysqli_query($conn, $query03)) {
            echo "<script>
                        document.location.href='tambah.php';
                        </script>";
        } else {
            echo "<script>
                        alert('Data gagal diubah!');
                        document.location.href='tambah.php';
                        </script>";
        }
    }
}
mysqli_close($conn);
?>