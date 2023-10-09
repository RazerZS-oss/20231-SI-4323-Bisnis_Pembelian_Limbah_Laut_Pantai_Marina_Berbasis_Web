<?php
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "rplproject");

// Memeriksa apakah kolom total_harga sudah ada
$queryCheckColumn = "SELECT * FROM information_schema.columns WHERE table_name = 'tb_datauser1' AND column_name = 'total_harga'";
$resultCheckColumn = mysqli_query($conn, $queryCheckColumn);
if (mysqli_num_rows($resultCheckColumn) == 0) {
  // Kolom total_harga belum ada, tambahkan kolom
  $queryAlterTable = "ALTER TABLE tb_datauser1 ADD total_harga INT(11) NOT NULL DEFAULT 0";
  mysqli_query($conn, $queryAlterTable);
}

if (isset($_POST['kembali'])) {
  $hapusQuery = "DELETE FROM tb_datauser1";
  mysqli_query($conn, $hapusQuery);
  mysqli_close($conn);
  header("Location: index.php");
  exit();
}

if (isset($_POST['kirim'])) {
  $nama = $_POST['namap'];
  $nik = $_POST['nikk'];
  $tlp = $_POST['notelpn'];
  $alamat = $_POST['alamat'];
  $jenis = $_POST['jenis'];
  $bayar = $_POST['bayar'];
  $bobot = $_POST['bobot'];

  // Menghitung total harga
  $harga = ($jenis == 'organik') ? 1000 : 500;
  $totalHarga = $harga * $bobot;

  $query = "INSERT INTO tb_datauser1 (namap, nikk, notelpn, alamat, jenis, bayar, bobot, total_harga) 
            VALUES ('$nama', '$nik', '$tlp', '$alamat', '$jenis', '$bayar', '$bobot', '$totalHarga')";
  if (mysqli_query($conn, $query)) {
    session_start();
    $_SESSION['data_formulir'] = array(
      'nama' => $nama,
      'nik' => $nik,
      'tlp' => $tlp,
      'alamat' => $alamat,
      'jenis' => $jenis,
      'bayar' => $bayar,
      'bobot' => $bobot,
      'total_harga' => $totalHarga
    );
    header("Location: hasil.php");
    exit();
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
