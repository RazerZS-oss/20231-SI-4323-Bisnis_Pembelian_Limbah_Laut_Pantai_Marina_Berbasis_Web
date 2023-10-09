<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- css bootsrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <!-- file css -->
    <link rel="stylesheet" href="css/style1.css">
</head>
  <body>
  
       
        <div class="login">
        <?php include "koneksi.php"; ?>
            <h1 class="text-center">Register</h1>
            
            <form action="" method="post">
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">No Telp</label>
                    <input class="form-control" type="text" name="notelp" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">NIK</label>
                    <input class="form-control" type="text" name="nik" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" name="username" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" required>
                </div>

                <input class="btn btn-success w-100" type="submit" name="register" value="REGISTER">
                <p>Sudah memiliki akun? <a href="login.php">Login!</a></p>
            </form>
            <?php
                if(isset($_POST['register'])){
                    $nama = $_POST['nama'];
                    $notelp = $_POST['notelp'];
                    $nik = $_POST['nik'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = "INSERT INTO tb_user (nama, notelp, nik, username, password) VALUES ('$nama', '$notelp', '$nik', '$username', '$password')";
                    if ($koneksi->query($query)) {
                        echo "<script>alert('Register berhasil'); window.location ='login.php'; </script>";
                    } else {
                        echo "<script>alert('Register gagal'); </script>";
                    }
                }
            ?>
            
            
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
