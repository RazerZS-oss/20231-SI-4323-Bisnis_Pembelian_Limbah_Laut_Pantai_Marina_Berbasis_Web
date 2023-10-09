<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mengambil data formulir dari $_POST
  $namap = $_POST['namap'];
  $nikk = $_POST['nikk'];
  $notelpn = $_POST['notelpn'];
  $alamat = $_POST['alamat'];
  $jenis = $_POST['jenis'];
  $bayar = $_POST['bayar'];
  $bobot = $_POST['bobot'];
  $harga = $_POST['harga'];
  $totalHarga = $_POST['total_harga'];

  // Lakukan operasi yang diperlukan dengan data tersebut
  // Misalnya, simpan ke database atau lakukan pemrosesan lainnya

  // Contoh: Menyimpan data ke tabel dalam database
  $conn = mysqli_connect("localhost", "root", "", "rplproject");
  $query = "INSERT INTO tb_formulir (namap, nikk, notelpn, alamat, jenis, bayar, bobot, harga, total_harga) 
            VALUES ('$namap', '$nikk', '$notelpn', '$alamat', '$jenis', '$bayar', '$bobot', '$harga', '$totalHarga')";
  if (mysqli_query($conn, $query)) {
    echo "Data formulir berhasil disimpan.";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>
