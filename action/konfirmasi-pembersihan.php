<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../icon.ico">
    <title>Pembukuan - [Konfirmasi Pembersihan]</title>
</head>

<body>
    <script>
        var result = confirm("Apakah Anda yakin ingin menghapus semua data?");
        if (result) {
            document.location.href = 'pembersihan-terkonfirmasi.php';
        }
    </script>
</body>

</html>