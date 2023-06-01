<?php
require "functions.php";
// cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){

// cek apakah data berhasil ditambahkan atau tidak
// Dalam commandprom apabila kita mencoba menambahkan data akan ada tambil 1, jika gagal mines 1,
// maka jika data conn lebih besar dari nol , maka data berhasil ditambah

if( tambah($_POST) > 0){
        // jadi data yg diisi di form akan diambil masukin kedalam tambah, lalu ditangkap oleh di file function data
    echo "
    <script>
        alert('Data Berhasil ditambahkan!');
        document.location.href = 'verifikasi.html';
    </script> 
    ";
       //disini kami sedikit menggunakan js fungsinya untuk redirect ke halaman index nya, walaupun bisa pakai properti php yaitu header, tapi agar lebih menarik kami pakai js 
}else{
    echo "
    <script>
        alert('Data GAGAL ditambahkan!');
        document.location.href = 'index3.php';
    </script> 
    ";
}
}
?>



<html lang="en">

<head>
    <title>Form Pendaftaran</title>
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
                        <h1>FORM PENERIMAAN MAHASISWA BARU</h1>

                        <input type="text" placeholder="Username" name="username" required>
                        <input type="text" placeholder="Email" name="email" required>

                        <!-- <input type="text" placeholder="Fakultas" name="fakultas" required> -->
                          <select name="fakultas" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>-- fakultas --</option>
                            <option value="Teknik">Teknik</option>
                            <option value="Kedokteran">Kedokteran</option>
                            <option value="Psikologi">Psikologi</option>
                        </select>
                        <br>
                        <select name="jurusan" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>-- jurusan --</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Dokter Hewan">Dokter Hewan</option>
                            <option value="Dokter Gigi">Dokter Gigi</option>
                            <option value="Psikologi Reguler">Psikologi Reguler</option>

                        </select>
                        <input type="submit" value="Proses" name="submit" required>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>

</html>