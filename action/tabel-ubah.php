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
    <title>Pembukuan - [Tabel Ubah]</title>
</head>

<body style="background-color:grey">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs text-center">
                                <li class="nav-item"><a class="nav-link active">Tabel Ubah</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <?php
                            include 'config.php';
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM transaksi WHERE id=$id";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <form method='post'>
                                        <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal :</label>
                                            <input class="form-control" type="date" id="tanggal" name="tanggal"
                                                value="<?php echo $row['tanggal']; ?>" required>
                                        </div>
                                        <label for="jumlah" class="form-label">Jumlah :</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" name="jumlah" class="form-control" placeholder="Tulis jumlah.."
                                                value="<?php echo $row['jumlah']; ?>" required>
                                        </div>
                                        <?php
                                        if ($row['warna'] === 'Biru') {
                                            echo "<select class='form-select mb-3' name='warna' required>
                                            <option value='Hitam'>Hitam</option>
                                            <option value='Biru' selected>Biru</option>
                                        </select>";
                                        } else {
                                            echo "<select class='form-select mb-3' name='warna' required>
                                            <option value='Hitam' selected>Hitam</option>
                                            <option value='Biru'>Biru</option>
                                        </select>";
                                        }
                                        ?>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan :</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                name="keterangan" placeholder="Tulis Keterangan.."
                                                required><?php echo $row['keterangan']; ?></textarea>
                                        </div>
                                        <label for="tipe" class="form-label">Tipe :</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="tipe" required>
                                                <?php
                                                if ($row['tipe'] == "Keluar") {
                                                    echo '<option value="Keluar" selected>Keluar</option>';
                                                    echo '<option value="Masuk">Masuk</option>';
                                                    echo '<option value="Catatan">Catatan</option>';
                                                } elseif ($row['tipe'] == "Masuk") {
                                                    echo '<option value="Keluar">Keluar</option>';
                                                    echo '<option value="Masuk" selected>Masuk</option>';
                                                    echo '<option value="Catatan">Catatan</option>';
                                                } else {
                                                    echo '<option value="Keluar">Keluar</option>';
                                                    echo '<option value="Masuk">Masuk</option>';
                                                    echo '<option value="Catatan" selected>Catatan</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" name="submit-ubah" class="btn btn-primary">Ubah</button>
                                        <a class="btn btn-danger" onclick="batal()">Batal</a>
                                    </form>
                                    <?php
                                }
                            }
                            mysqli_close($conn);
                            ?>
                            <script>
                                function batal() {
                                    document.location.href = '../page/tabel.php';
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
include 'config.php';
if (isset($_POST['submit-ubah'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $warna = $_POST['warna'];
    $keterangan = $_POST['keterangan'];
    $tipe = $_POST['tipe'];
    $sql = "UPDATE transaksi SET tanggal='$tanggal', jumlah='$jumlah', warna='$warna', keterangan='$keterangan', tipe='$tipe' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
    document.location.href='../page/tabel.php';
    </script>";
    } else {
        echo "<script>
    alert('Data gagal diubah!');
    document.location.href='../page/tabel.php';
    </script>";
    }
}
mysqli_close($conn);
?>