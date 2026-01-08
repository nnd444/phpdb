<?php
include_once("config.php");

if (isset($_GET['search']) && $_GET['search'] != "") {
    $key = $_GET['search'];

    $result = mysqli_query($mysqli, 
        "SELECT * FROM mahasiswati 
        WHERE nim LIKE '%$key%' 
        OR nama LIKE '%$key%'
        OR `asalsekolah` LIKE '%$key%'
        ORDER BY no ASC"
    );
} else {
    $result = mysqli_query($mysqli, "SELECT * FROM mahasiswati ORDER BY no ASC");
}


/* --------------------------------------------
      FUNGSI SEARCH CADANGAN (TANPA UBAH YG LAMA)
----------------------------------------------*/
if (
    (isset($_GET['search']) && $_GET['search'] != "") 
    && mysqli_num_rows($result) == 0
) {
    $key = $_GET['search'];

    // Backup search jika kolom Asal Sekolah error / tidak cocok
    $result = mysqli_query($mysqli, 
        "SELECT * FROM mahasiswati
         WHERE nim LIKE '%$key%'
         OR nama LIKE '%$key%'
         OR umur LIKE '%$key%'
         OR jeniskelamin LIKE '%$key%'
         OR asalsekolah LIKE '%$key%'
         ORDER BY no ASC"
    );
}
?>

<html>
<head>
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: #fdeef4;
        }
        .table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }
        .table-dark {
            background-color: #f8c8dc !important;
            color: black;
        }
        .btn-primary {
            background-color: #ff99c8;
            border-color: #ff99c8;
        }
        .btn-info {
            background-color: #a0c4ff;
            border-color: #a0c4ff;
            color: white;
        }
        .btn-warning {
            background-color: #ffc8dd;
            border-color: #ffc8dd;
            color: black;
        }
        .btn-danger {
            background-color: #ffafcc;
            border-color: #ffafcc;
            color: black;
        }
        .header-title {
            font-size: 26px;
            font-weight: bold;
            color: #d63384;
        }
    </style>

</head>

<body class="p-4">

<div class="container">

    <h2 class="header-title mb-4">
        🎀 Data Mahasiswa — Pastel Style 🎀
    </h2>

    <!-- Tombol Add -->
    <a href="add.php" class="btn btn-primary mb-3">
        <i class="bi bi-person-plus"></i> Add New User
    </a>

    <!-- SEARCH BAR -->
    <form method="GET" class="mb-3">
        <div class="input-group" style="max-width: 350px;">
            <input 
                type="text" 
                name="search" 
                class="form-control" 
                placeholder="Cari mahasiswa..."
                value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
            >
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    <table class="table table-bordered table-striped shadow">
        <tr class="table-dark text-center">
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Asal Sekolah</th>
            <th>Manage</th>
        </tr>

        <?php
        while($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$user_data['nim']."</td>";
            echo "<td>".$user_data['nama']."</td>";
            echo "<td>".$user_data['umur']."</td>";
            echo "<td>".$user_data['jeniskelamin']."</td>";
            echo "<td>".$user_data['asalsekolah']."</td>";

            echo "<td class='text-center'>

                <a href='show.php?no=$user_data[no]' class='btn btn-info btn-sm'>
                    <i class='bi bi-eye'></i> Show
                </a>

                <a href='edit.php?no=$user_data[no]' class='btn btn-warning btn-sm'>
                    <i class='bi bi-pencil-square'></i> Edit
                </a>

                <a href='delete.php?no=$user_data[no]' 
                   class='btn btn-danger btn-sm'
                   onclick=\"return confirm('Ingin hapus data Mahasiswa : $user_data[nim]')\">
                   <i class='bi bi-trash'></i> Delete
                </a>

            </td></tr>";
        }
        ?>
    </table>

</div>

</body>
</html>