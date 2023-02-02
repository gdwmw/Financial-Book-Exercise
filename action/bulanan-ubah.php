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
    <title>Pembukuan - [Bulanan Ubah]</title>
</head>

<body style="background-color:grey">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs text-center">
                                <li class="nav-item"><a class="nav-link active">Bulanan Ubah</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <?php
                            include '../action/config.php';
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM bulanan WHERE id=$id";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <form method='post'>
                                        <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan :</label>
                                            <textarea class="form-control" rows="3" name="keterangan"
                                                placeholder="Tulis Keterangan.."
                                                required><?php echo $row['keterangan']; ?></textarea>
                                        </div>
                                        <label for="anggaran" class="form-label">Anggaran :</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" name="anggaran" class="form-control"
                                                placeholder="Tulis anggaran.." value="<?php echo $row['anggaran']; ?>" required>
                                        </div>
                                        <label for="terpakai" class="form-label">Terpakai :</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" value="<?php echo $row['terpakai']; ?>"
                                                disabled>
                                            <input type="hidden" name="terpakai" value="<?php echo $row['terpakai']; ?>">
                                        </div>
                                        <!-- <label for="tambah" class="form-label">Tambah :</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Rp</span>
                                                            <input type="number" name="tambah" class="form-control"
                                                                placeholder="Tulis tambah..." value="000" required>
                                                        </div> -->
                                        <button type="submit" name="bulanan-ubah" class="btn btn-primary">Ubah</button>
                                        <a class="btn btn-danger" onclick="batal()">Batal</a>
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                            <script>
                                function batal() {
                                    document.location.href = '../page/bulanan.php';
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
if (isset($_POST['bulanan-ubah'])) {
    $id = $_POST['id'];
    $keterangan = $_POST['keterangan'];
    $anggaran = $_POST['anggaran'];
    // $tambah = $_POST['tambah'];
    // $terpakai = $_POST['terpakai'];
    // $sum = $terpakai + $tambah;
    $query = "UPDATE bulanan SET keterangan='$keterangan', anggaran='$anggaran' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "<script>
    document.location.href='../page/bulanan.php';
    </script>";
    } else {
        echo "<script>
    alert('Data gagal diubah!');
    document.location.href='../page/bulanan.php';
    </script>";
    }
}
mysqli_close($conn);
?>