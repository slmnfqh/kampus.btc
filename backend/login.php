<?php 
//koneksi ke database
require 'functions.php';

//cek apakah tombol login sudah di tekan / belum
if(isset($_POST['login'])) {

    //ambil data inputan user & masukkan ke dlm variabel
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cek di database username nya ada / tidak?
    $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if( mysqli_num_rows($user) === 1 ) {

        //cek password
        $row = mysqli_fetch_assoc($user);

        if( password_verify($password, $row['password']) ) {

            //jika password sama, maka pindahkan ke halaman home
            header("Location: form.php");
            exit;
            
        } else { 
            echo "<script>
                    alert ('Password Salah');
                    document.location.href = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
        alert ('user tidak ditemukan!');
        document.location.href = 'login.php';
    </script>";
    }
}
?>






<html lang="en">

<head>
    <title>MASUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <body>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container" id="container">
                <a id="logo" class="navbar-brand" href="../bootstrap.html">logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pembungkus"
                    aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- BUNGKUS NAVIGASI LINK-->
                <div class="collapse navbar-collapse" id="pembungkus">
                    <!-- BUKA NAVIGASI LINK -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../halaman/infodaftar.html">INFO PENDAFTARAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../halaman/pendidikan.html">AKADEMIK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../halaman/kontak.html">KONTAK</a>
                        </li>
                    </ul>
                </div>
                <!-- TUTUP BUNGKUS -->
            </div>
            <!-- TUTUP CONTAINER -->
        </nav>
        <!-- tutup -->



        <div class="container" id="cont">
            <form class="inner-container" method="post" action="">
                <div class="content-container">
                    <div id="sign-in">
                        <h1>MASUK</h1>
                        <input type="text" id="email-sign-in" placeholder="Username" name="username" required>
                        <input type="password" id="password-sign-in" placeholder="Password" name="password" required>
                        <p class="forget-password"> Belum Punya Akun ? <a id="btn-forget-password"
                                href="registrasi.php">Daftar
                                Disini!</a></p>
                        <p class="forget-password"><a id="btn-forget-password" href="loginadmin.php">
                                Login Sebagai Admin</a></p>
                        <input type="submit" value="Masuk" name="login">
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>

</html>