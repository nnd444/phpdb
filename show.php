<?php
include_once("config.php");

// Cek apakah ada parameter ?no= di URL
if (!isset($_GET['no']) || empty($_GET['no'])) {
    die("<h3 style='color:red; text-align:center; margin-top:50px;'>ID tidak ditemukan di URL!</h3>");
}

$no = $_GET['no'];

// Query ambil data
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswati WHERE no=$no");

if (mysqli_num_rows($result) == 0) {
    die("<h3 style='color:red; text-align:center; margin-top:50px;'>Data dengan ID tersebut tidak ditemukan!</h3>");
}

$data = mysqli_fetch_assoc($result);
?>

<html>
<head>
    <title>Detail Mahasiswa</title>

    <!-- Bootstrap 5 -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background-color: #fdebf3; 
        }
        .card {
            background: #fff;
            border-radius: 15px;
            border: 1px solid #f5c6d6;
            box-shadow: 0 4px 10px rgba(255, 182, 193, 0.3);
        }
        .title-bar {
            background: #ffb6c1;
            color: #fff;
            padding: 12px;
            border-radius: 15px 15px 0 0;
            font-size: 20px;
            text-align: center;
        }
        .btn-back {
            background: #ffb6c1;
            color: white;
        }
        .btn-back:hover {
            background: #ff9db1;
        }
    </style>
</head>

<body class="p-4">

<div class="container mt-4">
    <div class="card mx-auto" style="max-width: 450px;">
        <div class="title-bar">Detail Data Mahasiswa</div>
        
        <div class="card-body">
            <p><strong>NIM:</strong> <?php echo $data['nim']; ?></p>
            <p><strong>Nama:</strong> <?php echo $data['nama']; ?></p>
            <p><strong>Umur:</strong> <?php echo $data['umur']; ?></p>
            <p><strong>Jenis Kelamin:</strong> <?php echo $data['jeniskelamin']; ?></p>
            <p><strong>Asal Sekolah:</strong> <?php echo $data['asalsekolah']; ?></p>

            <a href="index.php" class="btn btn-back w-100 mt-3">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>