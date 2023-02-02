<?php
session_start();
?>

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
    <title>Pembukuan - [Bulanan]</title>
</head>

<body style="background-color:grey">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs text-center">
                                <li class="nav-item"><a class="nav-link" href="tambah.php">Tambah</a></li>
                                <li class="nav-item"><a class="nav-link active">Bulanan</a></li>
                                <li class="nav-item"><a class="nav-link" href="tabel.php">Tabel</a></li>
                                <li class="nav-item"><a class="nav-link" href="ekspor.php">Ekspor</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <form method='post'>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan :</label>
                                    <textarea class="form-control" rows="3" name="keterangan"
                                        placeholder="Tulis Keterangan.." required></textarea>
                                </div>
                                <label for="anggaran" class="form-label">Anggaran :</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="anggaran" class="form-control"
                                        placeholder="Tulis anggaran.." value="000" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary mb-3">Simpan</button>
                            </form>
                            <table class="table text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Uang Bulanan</th>
                                        <th scope="col">Total Anggaran</th>
                                        <th scope="col">Total Terpakai</th>
                                        <th scope="col">Sisa Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php
                                            $uang_bulanan = "3100000";
                                            echo "Rp " . number_format($uang_bulanan, 0, ",", ".") . "";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            include('../action/config.php');
                                            $query = "SELECT SUM(anggaran) as total_anggaran FROM bulanan WHERE anggaran";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_array($result);
                                            $total_anggaran = $row['total_anggaran'];
                                            echo "Rp " . number_format($row['total_anggaran'], 0, ",", ".") . "";
                                            mysqli_close($conn);
                                            ?>
                                        </td>
                                        <?php
                                        include('../action/config.php');
                                        $query = "SELECT SUM(terpakai) as total_terpakai FROM bulanan WHERE terpakai";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result);
                                        $total_terpakai = $row['total_terpakai'];
                                        if ($total_terpakai < $total_anggaran) {
                                            echo "<td style='color: green;'>Rp " . number_format($row['total_terpakai'], 0, ",", ".") . "</td>";
                                        } elseif ($total_terpakai > $total_anggaran) {
                                            echo "<td style='color: red;'>Rp " . number_format($row['total_terpakai'], 0, ",", ".") . "</td>";
                                        } else {
                                            echo "<td>Rp " . number_format($row['total_terpakai'], 0, ",", ".") . "</td>";
                                        }
                                        mysqli_close($conn);
                                        ?>
                                        <?php
                                        $sisaBUJA = $uang_bulanan - $total_anggaran;
                                        $sisa = $_SESSION['sisa'] = ($total_anggaran - $total_terpakai) + $sisaBUJA;
                                        if ($sisa > 500000) {
                                            echo "<td style='color: green;'>Rp " . number_format($sisa, 0, ",", ".") . "</td>";
                                        } elseif ($sisa < 500000 && $sisa >= 0) {
                                            echo "<td style='color: orange;'>Rp " . number_format($sisa, 0, ",", ".") . "</td>";
                                        } else {
                                            echo "<td style='color: red;'>Rp " . number_format($sisa, 0, ",", ".") . "</td>";
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="overflow-tabel-scroll">
                                <table class="table text-center">
                                    <thead class="table-light">
                                        <tr class="sticky-top">
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Anggaran</th>
                                            <th scope="col">Terpakai</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../action/bulanan.php';
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>