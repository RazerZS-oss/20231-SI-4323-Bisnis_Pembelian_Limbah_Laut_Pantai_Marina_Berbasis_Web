<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "rplproject");
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Cek apakah pengguna sudah login atau belum
if (isset($_SESSION['user'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
    header("Location: login.php"); // Pengalihan ke halaman login.php
    exit();
}


// Proses logout jika pengguna mengklik tombol Log Out
if (isset($_POST['logout'])) {
    // Hapus semua data sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Mengarahkan pengguna ke login.php
    header('Location: login.php');
    exit();
}

// Tombol "Hapus" diklik
if (isset($_POST['hapus'])) {
    // Hapus data formulir user
    $conn->query("DELETE FROM tb_kurir1");

    // Refresh halaman
    header('Location: jadwal.php');
    exit();
}

// Menampilkan data laporan PT
$query = "SELECT * FROM tb_kurir1";
$result = mysqli_query($conn, $query);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembelian Limbah Laut</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="picture/logo.jpg">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">P<span class="text-warning">L</span>L</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if ($isLoggedIn) { ?>
                    <li class="nav-item">
                        <form action="" method="post">
                            <button class="btn btn-danger" type="submit" name="logout">Log Out</button>
                        </form>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a href="../login.php" class="btn btn-warning">Sign In</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php if ($isLoggedIn) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="jadwal.php">Jadwal</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Vision</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
                      <br>
    <div class="col-md-10 p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-4">
                    <section id="laporan-pt" class="section-padding">
                        <div class="container">
                            <div class="row m-0">
                                <div class="col-md-12 p-0 pt-4 p-4 m-auto">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama</th>
                                                            <th>No. Telepon</th>
                                                            <th>Alamat</th>
                                                            <th>Waktu</th>
                                                            <th>Tanggal</th>
                                                            <th>Jenis Sampah</th>
                                                            <th>Metode Pembayaran</th>
                                                            <th>Bobot (kg)</th>
                                                            <th>Total Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<tr>";
                                                            echo "<td>" . $no . "</td>";
                                                            echo "<td>" . $row['namap'] . "</td>";
                                                            echo "<td>" . $row['notelpn'] . "</td>";
                                                            echo "<td>" . $row['alamat'] . "</td>";
                                                            echo "<td>" . $row['jam'] . "</td>";
                                                            echo "<td>" . $row['waktu'] . "</td>";
                                                            echo "<td>" . $row['jenis'] . "</td>";
                                                            echo "<td>" . $row['bayar'] . "</td>";
                                                            echo "<td>" . $row['bobot'] . "</td>";
                                                            echo "<td>" . $row['totalharga'] . "</td>";
                                                            echo "</tr>";
                                                            $no++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <form method="post" action="">
                                                    <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
