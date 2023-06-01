<?php
require "functions.php";
// kita tangkap dulu id nya yg dikirim melalui url lalu masukan ke dalam dolar id/ variable id
$id = $_GET["id"];
// selanjutnya kita bikin function bernama hapus,yang isinya id tadi
// jadi kita akan mengirimi id ke function hapus
if (hapus($id) > 0 ){
    echo "
    <script>
        alert('Data Berhasil dihapus!');
        document.location.href = 'index2.php';
    </script> 
    ";
}else{
    echo "
    <script>
        alert('Data GAGAL dihapus!');
        document.location.href = 'index2.php';
    </script> 
    ";
}


?>