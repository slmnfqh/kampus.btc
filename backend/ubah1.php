<?php
require "functions.php";

// ambil data di url dari id yg dikirim
$id = $_GET["id"];


// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];




// cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
// cek apakah data berhasil ditambahkan atau tidak
// Dalam commandprom apabila kita mencoba menambahkan data akan ada tambil 1, jika gagal mines 1,
// maka jika data conn lebih besar dari nol , maka data berhasil ditambah

if( ubah($_POST) > 0){
        // jadi data yg diisi di form akan diambil masukin kedalam tambah, lalu ditangkap oleh di file function data
    echo "
    <script>
        alert('Selamat Data Berhasil diubah!');
        document.location.href = 'index2.php';
    </script> 
    ";
       //disini sedikit menggunakan js fungsinya untuk redirect ke halaman index nya, walaupun bisa pakai properti php yaitu header, tapi agar lebih menarik kami pakai js 
}else{
    echo "
    <script>
        alert('Selamat Data Berhasil diubah!');
        document.location.href = 'index2.php';
    </script> 
    ";
}
}
?>

<html lang="en">

<head>
    <title>MASUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="ubah1.css">
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
                        <!-- untuk id menggunakan type hidden yg gunanaya hanya untuk mengirim ke url lalu di tangkap difile function, sehingga user tdk perlu
                             input, tetapi tetap ada sebetulnya -->
                        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                        <h1>Ubah Data Mahasiswa</h1>
                        <input type="text" id="nama" name="nama" value="<?= $mhs["nama"]; ?>">
                        <input type="text" id="email" name="email" value="<?= $mhs["email"]; ?>">
                        <input type="text" id="fakultas" name="fakultas" value="<?= $mhs["fakultas"]; ?>">
                        <input type="text" id="jurusan" name="jurusan" value="<?= $mhs["jurusan"]; ?>">
                        <input type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>

</html>