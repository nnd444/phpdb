<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswati</title>

    <!-- Bootstrap 5 -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    >

    <style>
        body {
            background: #fdeef4; /* Pastel Pink */
        }

        .card {
            background: #ffffff;
            border: 2px solid #ffc8dd;
            border-radius: 15px;
        }

        h3 {
            color: #d63384;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #ff8fab;
            border-color: #ff8fab;
        }

        .btn-primary:hover {
            background-color: #ff5d8f;
        }

        .btn-secondary {
            background-color: #bde0fe;
            border-color: #bde0fe;
        }

        .btn-secondary:hover {
            background-color: #a2d2ff;
        }

        .table td {
            vertical-align: middle;
        }

        .form-control, .form-select {
            border-radius: 10px;
        }

        .alert-success {
            background-color: #ffccd5;
            border-color: #ffb3c6;
            color: #7a2258;
            font-weight: 500;
        }
    </style>
</head>

<body>

<div class="container mt-4">

    <a href="index.php" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left-circle"></i> List Mahasiswati
    </a>

    <div class="card p-4 shadow-sm">
        <h3 class="mb-3 text-center">
            ✨ Tambah Data Mahasiswa ✨
        </h3>

        <!-- CODINGAN ASLI TIDAK DIUBAH, hanya diberi CSS -->
        <form action="add.php" method="post" name="form1">
            <table class="table table-borderless">

                <tr>
                    <td>NIM</td>
                    <td><input type="number" class="form-control" name="nim" required></td>
                </tr>

                <tr>
                    <td>Nama</td>
                    <td><input type="text" class="form-control" name="nama" required></td>
                </tr>

                <tr>
                    <td>Umur</td>
                    <td><input type="number" class="form-control" name="umur" required></td>
                </tr>

                <tr>
                    <td><label for="jk">Jenis Kelamin</label></td>
                    <td>
                        <select id="jk" name="jeniskelamin" class="form-select" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Sekolah Asal</td>
                    <td><input type="text" class="form-control" name="asalsekolah" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add
                        </button>
                    </td>
                </tr>
            </table>
        </form>
        <!-- END CODINGAN ASLI -->
    </div>

</div>

<?php
if (isset($_POST['submit'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $asalsekolah = $_POST['asalsekolah'];

    include_once("config.php");

    $result = mysqli_query($mysqli, 
        "INSERT INTO mahasiswati(nim,nama,umur,jeniskelamin,asalsekolah) 
        VALUES('$nim','$nama','$umur','$jeniskelamin','$asalsekolah')"
    );

    echo "<div class='container mt-3'>
            <div class='alert alert-success shadow-sm'>
                Mahasiswa berhasil ditambahkan 🎉 
                <a href='index.php' class='alert-link'>Lihat List Mahasiswa</a>
            </div>
          </div>";
}
?>
</body>
</html>