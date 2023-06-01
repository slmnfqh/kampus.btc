<?php 
require '../backend/functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa
    WHERE 
    nama LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    fakultas LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'
                        ";
$mahasiswa = query($query);
?>



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
                   
