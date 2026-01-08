<?php
include_once("config.php");

if(isset($_POST['update']))
{
    $no = $_POST['no'];

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $sekolahasal = $_POST['asalsekolah'];

    // Kolom Asal Sekolah harus dibungkus ``
    $result = mysqli_query($mysqli, 
        "UPDATE mahasiswati 
         SET nama='$nama',
             umur='$umur',
             jeniskelamin='$jeniskelamin',
             asalsekolah='$sekolahasal'
         WHERE no='$no'"
    );

    header("Location: index.php");
}
?>

<?php
$no = $_GET['no'];

$result = mysqli_query($mysqli, "SELECT * FROM mahasiswati WHERE no=$no");

while($user_data = mysqli_fetch_array($result))
{
    $nim = $user_data['nim'];
    $nama = $user_data['nama'];
    $umur = $user_data['umur'];
    $jeniskelamin = $user_data['jeniskelamin'];
    $asalsekolah = $user_data['asalsekolah'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: #fdeef4;
        }

        .card {
            background: #ffffff;
            border-radius: 15px;
            border: 2px solid #ffc8dd;
        }

        h3 {
            color: #d63384;
            font-weight: bold;
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

        .form-control,
        .form-select {
            border-radius: 10px;
        }

        label {
            font-weight: 500;
            color: #d63384;
        }
    </style>
</head>

<body>

<div class="container mt-4">

    <a href="index.php" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    <div class="card p-4 shadow">
        <h3 class="text-center mb-3">✨ Edit Data Mahasiswa ✨</h3>

        <form name="update_user" method="post" action="edit.php">

            <div class="mb-3">
                <label>NIM</label>
                <input type="text" class="form-control" name="nim" value="<?php echo $nim; ?>" readonly>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" required>
            </div>

            <div class="mb-3">
                <label>Umur</label>
                <input type="number" class="form-control" name="umur" value="<?php echo $umur; ?>" required>
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin">
                    <option value="laki-laki" <?php if($jeniskelamin == "laki-laki") echo "selected"; ?>>Laki-laki</option>
                    <option value="perempuan" <?php if($jeniskelamin == "perempuan") echo "selected"; ?>>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Sekolah Asal</label>
                <input type="text" class="form-control" name="asalsekolah" value="<?php echo $asalsekolah; ?>" required>
            </div>

            <input type="hidden" name="no" value="<?php echo $no; ?>">

            <button type="submit" name="update" class="btn btn-primary w-100 mt-2">
                <i class="bi bi-check-circle"></i> Update Data
            </button>

        </form>
    </div>

</div>

</body>
</html>
