<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <!-- css bootsrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- file css -->
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <div class="login">
        <?php
        session_start();
        include "koneksi.php";

        if (isset($_POST['login'])) {
            $uname = $_POST['username'];
            $pwd = $_POST['password'];

            $qry = $koneksi->query("SELECT * FROM tb_user WHERE username='$uname' AND password='$pwd'");
            $result = mysqli_num_rows($qry);

            if ($result === 1) {
                $data = $qry->fetch_assoc();

                $_SESSION['user'] = true;

                echo "<script>alert('Login Berhasil');window.location='index.php'</script>";
            } else {
                $salah = "<p class='text-danger'>username dan password salah</p>";
            }
        }
        ?>
        
        <h1 class="text-center">Log In For User</h1>
        <form action="" method="post">
            <div class="form-group">
                <label class="form-label">Username</label>
                <input class="form-control" type="text" name="username" id="">
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="password" id="">
            </div>
            <?php echo isset($salah) ? $salah : ''; ?>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" id="checkbox">
                <label class="form-check-label" for="checkbox">Remember me</label>
            </div>

            <input class="btn btn-success w-100" type="submit" name="login" value="LOG IN">
            <p>belum memiliki akun? <a href="register.php">register</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
