<?php
require 'functions.php';

// cek apakah tombol register sudah dipencet atau belum
if (isset($_POST["register"])) {
// jika sudah di tekan / pencet, maka jalankan function registrasi

if (registrasi ($_POST) > 0 ){
// karna menggunakan mysqli_affected_row,
// maka jika lebih dari nol itu artinya ada user yg berhasil masuk ke database
// jika berhasil maka :
echo "<script>
        alert ('user baru berhasil ditambahkan !');
        document.location.href = 'login.php';
    </script>";
// itu kalo berhasil, jika gagal maka :
}else {
    echo "<script>
        alert ('user gagal ditambahkan !');
        document.location.href = 'registrasi.php';
    </script>";
}
}
?>


<html lang="en">

<head>
    <title>PENDAFTARAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="registrasi.css">
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
                            <a class="nav-link" href="../halaman/infodaftar.html">ALUR PENDAFTARAN</a>
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
                        <h1>BUAT AKUN</h1>

                        <input type="text" htmlspecialchars placeholder="Username" name="username" required>
                        <input type="password" htmlspecialchars placeholder="Password" name="password" required>
                        <input type="password" htmlspecialchars placeholder="Confirm Password" name="password2" required>
                        <input type="submit" htmlspecialchars value="Proses" name="register">
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>

</html>