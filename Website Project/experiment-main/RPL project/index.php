<?php
session_start();

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

    // Redirect ke halaman login atau halaman lain yang sesuai
    header('Location: login.php');
    exit();
}
// Proses pengiriman formulir jika pengguna sudah login
if ($isLoggedIn && $_SERVER['REQUEST_METHOD'] === 'POST') {
  // Proses data formulir
  // ...

  // Tampilkan pesan sukses setelah formulir berhasil dikirim
  $successMessage = 'Formulir berhasil dikirim!';
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eco Management Recycle</title>
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <?php } ?> 
                <?php if ($isLoggedIn) { ?>
        <?php } else { ?>

          <a href="login.php" class="btn btn-warning  ">Sign In</a>
        <?php } ?> 
        
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="jadwal.php">Jadwal</a>
          </li>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#vision">Vision</a>
              </li>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="#portfolio">Portfolio</a>
                </li>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                  </li>
                </ul>
      </div>
    </div>
  </nav>
  <!-- navbar end -->

  <!-- carousel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img style="height:700px"
          src="https://s3.scoopwhoop.com/anj/sw/b8f8df71-3d9b-4f7e-8ca1-b362832770ec.jpg"
          class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Sustainability</h5>
          <p>Untuk masa depan yang lebih baik</p>
          <p><a href="" class="btn btn-warning mt3">Learn more</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img style="height:700px"
          src="https://image.vietnamnews.vn/uploadvnnews/Article/2018/6/4/rac95633443PM.jpg"
          class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Impact</h5>
          <p>Memberikan dampak yang positif bagi kehidupan</p>
          <p><a href="" class="btn btn-warning mt3">Learn more</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img style="height:700px"
          src="https://victoria.mediaplanet.com/app/uploads/sites/45/2019/09/GettyImages-486841118-888x500.jpg" class="d-block w-100"
          alt="...">
        <div class="carousel-caption">
          <h5>Konservation</h5>
          <p>Menciptakan kelestarian Sumber Daya Alam</p>
          <p><a href="" class="btn btn-warning mt3">Learn more</a></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- carousel end -->

  <!-- about section -->
  <section id="about" class="about-section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-12">
          <div class="about-img">
            <img src="picture/logo1.jpg" alt="" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
          <div class="about-text">
            <h2>About<br>PEMBELIAN LIMBAH LAUT</h2>
            <p>Kami hadir sebagai solusi saat ini untuk memfasilitasi transaksi jual beli barang bekas.
              Melalui aplikasi ini, anda dapat dengan mudah menjual barang bekas yang tidak
              lagi dibutuhkan, dan dapat membeli barang tersebut dengan harga yang lebih terjangkau daripada membeli
              barang baru.
              Dengan demikian, aplikasi ini tidak hanya mengurangi limbah,
              tetapi juga dapat mendaur ulang barang yang lebih bermanfaat ke depannya.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about section end-->

  <!-- vision Section -->
  <section id="vision" class="service section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Vision</h2>
            <p>Tujuan kami</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-12 col-lg-4">
          <div class="card text-white text-center bg-dark pb-2">
            <div class="card-body">
              <i class="bi bi-archive-fill"></i>
              <h3 class="card-title">Menjaga lingkungan</h3>
              <p class="lead">
                Dengan layanan ini, kami bertujuan untuk menjaga lingkungan, agar tidak ada lagi barang bekas
                yang dibuang sembarangan dan berdampak kepada masalah baru.
              </p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-12 col-lg-4">
          <div class="card text-white text-center bg-dark pb-2">
            <div class="card-body">
              <i class="bi bi-bag-dash-fill"></i>
              <h3 class="card-title">Melayani sepenuh hati</h3>
              <p class="lead">
                kami siap melayani anda dengan sepenuh hati dalam menjadi mitra utama bagi anda untuk menciptakan
                lingkungan yang
                sehat, demi keberlanjutan masa depan.
              </p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-12 col-lg-4">
          <div class="card text-white text-center bg-dark pb-2">
            <div class="card-body">
              <i class="bi bi-chat-left-dots-fill"></i>
              <h3 class="card-title">Antar Jemput</h3>
              <p class="lead">
                Tak perlu repot! Kami siap datang ke lokasi anda kapan pun, di mana pun. Anda bisa menghubungi melalui
                layanan website
                dan call canter kami. Jadi, tunggu apa lagi?
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- vision Section end-->
  <br>
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="pt-md-5">
    <h2 class="text-center my-5">Portofolio</h2>

    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="card">
            <img src="picture/portfolio/portal1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Tutup botol siap olah</h5>
              <p class="card-text"></p>
              
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card">
            <img src="picture/portfolio/portal2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Biji plastik hasil recycle</h5>
              <p class="card-text"></p>
              
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card">
            <img src="picture/portfolio/portal3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Klasifikasi jenis sampah</h5>
              <p class="card-text"></p>
        
            </div>
          </div>
        </div>
        <div class="col-4 mt-md-4">
          <div class="card">
            <img src="picture/portfolio/portal4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Pendataan barang bekas</h5>
              <p class="card-text"></p>
              
            </div>
          </div>
        </div>
        <div class="col-4 mt-md-4">
          <div class="card">
            <img src="picture/portfolio/portal5.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Botol plastik siap olah</h5>
              <p class="card-text"></p>
              
            </div>
          </div>
        </div>
        <div class="col-4 mt-md-4">
          <div class="card">
            <img src="picture/portfolio/portal6.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Proses peleburan botol</h5>
              <p class="card-text"></p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->
<br><br>
  <!-- Contact Section -->
  <?php if ($isLoggedIn): ?>
  <section id="contact" class="section-padding">
    <form action="proses.php" method="post">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Contact us</h2>
          </div>
        </div>
      </div>
      <div class="row m-0">
        <div class="col-md-12 p-0 pt-4 p-4 m-auto">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="namap" id="namap" required placeholder="Nama Panjang">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="nikk" id="nikk" required placeholder="NIK">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="notelpn" id="notelpn" required placeholder="Nomer Telepon">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="alamat" id="alamat" required placeholder="Alamat">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <!-- <input type="select" class="form-select" required placeholder="Jenis Sampah"> -->
                <select name="jenis" id="jenis" class="form-select">
                  <label for="jenis">Jenis Sampah</label>
                  <option value="anorganic">Anorganic</option>
                  <option value="organic">Organic</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <!-- <input type="select" class="form-select" required placeholder="Metode Pembayaran"> -->
                <select name="bayar" id="bayar" class="form-select" required>
                  <label for="bayar">Metode Pembayaran</label>
                  <option value="cash">Cash</option>
                  <option value="ecash">E-Money</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="bobot" id="bobot" required placeholder="Bobot(kg)">
              </div>
            </div>
            <!-- tombol Section -->
            <div class="tombol">
              <input type="submit" value="submit" class="btn btn-warning" name="kirim">
            </div>
            <!-- tombol Section end -->
          </div>
        </div>
      </div>
    </div>
    </form>
  </section>
  <?php else: ?>
    <div class="text-center">
      <h3>Silakan login terlebih dahulu untuk mengisi formulir.</h3>
      <p><a href="login.php" class="btn btn-warning ">Login</a></p>
    </div>
  <?php endif; ?>
  <!-- Contact Section end -->




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</body>

</html>