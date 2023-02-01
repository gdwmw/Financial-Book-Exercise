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
    <title>Pembukuan - [Ekspor]</title>
</head>

<body style="background-color:grey">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs text-center">
                                <li class="nav-item"><a class="nav-link" href="tambah.php">Tambah</a></li>
                                <li class="nav-item"><a class="nav-link" href="bulanan.php">Bulanan</a></li>
                                <li class="nav-item"><a class="nav-link" href="tabel.php">Tabel</a></li>
                                <li class="nav-item"><a class="nav-link active">Ekspor</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <form action="../action/xlsx.php" method="post">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="mt-2 btn btn-success">Ekspor data ke format
                                        (.xlsx)</button>
                                </div>
                            </form>
                            <form action="../action/xls.php" method="post">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="mt-2 btn btn-success">Ekspor data ke format
                                        (.xls)</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>