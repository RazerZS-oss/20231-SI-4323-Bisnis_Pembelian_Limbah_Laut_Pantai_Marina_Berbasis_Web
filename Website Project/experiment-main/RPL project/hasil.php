<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "rplproject");
// Cek apakah pengguna sudah login atau belum
if (isset($_SESSION['user'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
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

// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "rplproject");
$data = $conn->query("SELECT * FROM tb_datauser1");
$row = $data->fetch_assoc();

if (isset($_POST['kembali'])) {
    $hapusQuery = "DELETE FROM tb_datauser1";
    mysqli_query($conn, $hapusQuery);
    mysqli_close($conn);
    header("Location: index.php");
    exit();
}

// Mendapatkan harga
$jenis = isset($row['jenis']) ? $row['jenis'] : '';
$harga = 0;

// Menentukan harga berdasarkan jenis sampah
if ($jenis == 'anorganic') {
    $harga = 1000;
} elseif($jenis == 'organic') {
    $harga = 500;
}

// Menghitung total harga
$totalHarga = isset($row['bobot']) ? $harga * $row['bobot'] : 0;

// Jika pengguna memilih untuk melanjutkan, kirim data formulir ke save_data.php
if (isset($_POST['lanjutkan'])) {
    // Kirim data formulir ke save_data.php menggunakan metode POST
    $url = 'save_data.php';
    $fields = [
        'namap' => $row['namap'],
        'nikk' => $row['nikk'],
        'notelpn' => $row['notelpn'],
        'alamat' => $row['alamat'],
        'jenis' => $row['jenis'],
        'bayar' => $row['bayar'],
        'bobot' => $row['bobot'],
        'harga' => $harga,
        'totalHarga' => $totalHarga
    ];

    // Inisialisasi curl
    $ch = curl_init();

    // Set opsi curl
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Eksekusi curl dan dapatkan responsenya
    $response = curl_exec($ch);

    // Tutup curl
    curl_close($ch);

    // Mengarahkan pengguna ke tamnot.php setelah melanjutkan
    header("Location: tamnot.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 p-0 pt-4 p-4 m-auto">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Data Formulir</h5>
                    <p>Nama             = <?= isset($row['namap']) ? $row['namap'] : '' ?></p>
                    <p>NIK              = <?= isset($row['nikk']) ? $row['nikk'] : '' ?></p>
                    <p>No Telp          = <?= isset($row['notelpn']) ? $row['notelpn'] : '' ?></p>
                    <p>Alamat           = <?= isset($row['alamat']) ? $row['alamat'] : '' ?></p>
                    <p>Jenis Sampah     = <?= isset($row['jenis']) ? $row['jenis'] : '' ?></p>
                    <p>Jenis Pembayaran = <?= isset($row['bayar']) ? $row['bayar'] : '' ?></p>
                    <p>Bobot            = <?= isset($row['bobot']) ? $row['bobot'] : '' ?> Kg</p>
                    <p>Harga            = Rp. <?= $harga ?></p>
                    <p>Total Harga      = Rp. <?= $totalHarga ?></p>
                    <form method="post" action="">
                        <button type="submit" name="kembali" class="btn btn-warning">Kembali</button>
                        <button type="submit" name="lanjutkan" class="btn btn-warning">Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>
</html>
