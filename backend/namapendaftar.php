<!-- menyiapkan data logic untuk ditampil di badan html -->
<?php 
// Panggil/ ambil file koneksi database dari file functions,lalu simpan disini
// untuk memanggil bisa pakai require atau include
require 'functions.php';
// variable mahasiswa ini merupakan variable yg sudah menampung isi data dari data base yg sudah dilakukan di file function 
// adapun mekanisme query nya di file functions
$mahasiswa = query("SELECT * FROM mahasiswa");


// Pengaplikasian : Jadi Ketika tombol cari ditekan, variable mahasiswa yg diatas itu akan ditimpa dengan variable mahasiswa baru yg ada dibawah ini
// kalau tombol cari dipencet, ambil apapun yg diketikan oleh user
// lalu masukan kedalam function cari
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BTC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="namapendaftar.css" />
</head>

<body>
    <!-- BUKA NAVBAR -->
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
                        <a class="nav-link" href="#jadwal">JADWAL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#visi">ALUR PENDAFTARAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#struktur">BIAYA</a>
                    </li>
                </ul>
            </div>
            <!-- TUTUP BUNGKUS -->
        </div>
        <!-- TUTUP CONTAINER -->
    </nav>
    <!-- tutup -->

    <!-- buka konten 1 -->
    <section class="jadwal" id="jadwal">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md">
                    <h1 class="fw-bold">Daftar Mahasiswa</h1>
                    <h6 class="mb-5"></h6>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md py-5">
                        <h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Fakultas</th>
                                        <th>Jurusan</th>
                                    </tr>

                                </thead>
                                <?php $i= 17211160;?>
                                <?php foreach ($mahasiswa as $row) : ?>
                                <tbody>
                                    <tr>
                                        <th><?= $i; ?></th>
                                        <td><?= $row["nama"]; ?></td>
                                        <td><?= $row["email"]; ?></td>
                                        <td><?= $row["fakultas"]; ?> </td>
                                        <td><?= $row["jurusan"]; ?></td>
                                </tbody>
                                <?php $i++ ?>
                                <?php endforeach;?>
                            </table>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tutup konten 1 -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>