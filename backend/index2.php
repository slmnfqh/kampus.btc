<!-- menyiapkan data logic untuk ditampil di badan html -->
<?php 
// Panggil/ ambil file koneksi database dari file functions,lalu simpan disini
// untuk memanggil bisa pakai require atau include
require 'functions.php';
// variable mahasiswa ini merupakan variable yg sudah menampung isi data dari data base yg sudah dilakukan di file function 
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
    <link rel="stylesheet" href="index.css" />
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
                        <a class="nav-link" href="../halaman/infodaftar.html">INFO PENDAFTARAN</a>
                    </li>
                </ul>
            </div>
            <!-- TUTUP BUNGKUS -->
        </div>
        <!-- TUTUP CONTAINER -->
    </nav>
    <!-- tutup -->
    <section class="jadwal" id="jadwal">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md">
                    <h1 class="fw-bold">Daftar Mahasiswa</h1>
                    <h6 class="mb-5"></h6>
                </div>


                <form action="" method="POST">

                    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian"
                        autocomplete="off" id="keyword">
                    <button type="submit" name="cari" id="cari">Search</button>
                </form>
                
               
                <div class="row justify-content-center">
                    <div class="col-md py-5">
                        <h5>
                        <div id="ubah-ajax">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Aksi</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Fakultas</th>
                                        <th>Jurusan</th>
                                    </tr>
                                    <!-- buat perulangan i untuk nomor urutnya, karna apabila memanggil id dari database, data yg dihapus akan ikut kehapus juga -->
                                    <?php $i= 17211161;?>
                                    <?php foreach ($mahasiswa as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <!-- AKSI -->
                                        <td>
                                            <a href="ubah1.php?id=<?=$row["id"]; ?>">Ubah</a> |
                                            <!-- untuk di link/href hapus, kita gunakan properti js untuk mengkonfirmasi yaitu popup confirm -->
                                            <a href="hapus.php?id=<?= $row["id"]; ?>"
                                                onclick="return confirm ('Yakin di apus ???')" ;>Hapus</a>
                                        </td>
                                        <td><?= $row["nama"]; ?></td>
                                        <td><?= $row["email"]; ?></td>
                                        <td><?= $row["fakultas"]; ?></td>
                                        <td><?= $row["jurusan"]; ?></td>
                                    </tr>
                                    <?php $i++ ?>
                                    <?php endforeach;?>
                            </table>
                            </div>
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
    <script src="../js.js"></script>
</body>

</html>