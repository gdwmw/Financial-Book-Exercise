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
    <title>Pembukuan - [Tabel]</title>
</head>

<body style="background-color:grey">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs text-center">
                                <li class="nav-item"><a class="nav-link" href="tambah.php">Tambah</a></li>
                                <li class="nav-item"><a class="nav-link" href="bulanan.php">Bulanan</a></li>
                                <li class="nav-item"><a class="nav-link active">Tabel</a></li>
                                <li class="nav-item"><a class="nav-link" href="ekspor.php">Ekspor</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <table class="table text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Sisa Saldo Bulanan</th>
                                        <th scope="col">Total Masuk</th>
                                        <th scope="col">Total Keluar</th>
                                        <th scope="col">Sisa Saldo Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../action/display-total.php';
                                    ?>
                                </tbody>
                            </table>
                            <div class="overflow-tabel-scroll mt-5">
                                <table class="table text-center">
                                    <thead class="table-light">
                                        <tr class="sticky-top">
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Tipe</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../action/display-data.php';
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