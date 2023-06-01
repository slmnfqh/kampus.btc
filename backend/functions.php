<!-- Tujuan membuat file function untuk memisahkan logic/logika program dengan tampilan program (mvc) model view controler -->
<?php
// koneksi ke database
// untuk urutan parameternya ada 4 : hostname, username, password,nama database nya
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


// Function untuk mengambil data dari database
function query($query)
{
    // variable scoop, pada function variable conn ini tdk tersambung dengan yg diluar function. maka butuh variable global.
    global $conn;
    // untuk ururtan query mengambil data dari database ada 2 parameternya : connect ke database,dan string query yg terdapat di file index
    // selanjutnya kami membuat variable baru yg bernama result yg fungsinya untuk menampung data dari yg akan kita ambil
    // istilahnya si result ini merupakan lemari nya
    $result = mysqli_query($conn, $query);
    // lalu menyiapkan wadah kosong bernama rows, untuk menampung data dari lemari / tabel mahasiswa dari database
    $rows = [];

    // untuk mengambil nya itu ada 4 cara :
    // mysqli_fetch_row = secara numerik
    // mysqli_fetch_assoc = secara associative
    // mysqli_fetch_array = secara keduanya(numerik dan associative)
    // mysqli_fetch_object = secara objek (->nama, atau ->email dst) (tidak disarankan)
    // kami untuk mengambil nya menggunakan fetch_assoc
    while ($row = mysqli_fetch_assoc($result)) {
        // jadi perumpamaan mudahnya, kita mengambil data dari lemari / tabel data base, lalu dimasukan satu persatu kedalam variable kosong rows menggunakan lopping while
        $rows[] = $row;
        // ambil data simpen kotak,ambil data simpen kotak(disebelahnya)
    }
    // lalu kembalikan kotaknya
    return $rows;
    // jadi si rows ini bentuknya udh array asosiatif yg rapih
    // yg akan di tampung di variable mahasiswa di file nama pendaftar
}

// Function untuk menambahkan data ke database
function tambah($data)
{
    //data nanti dikirim kedalam sini dan nanti ditangkap oleh variable
    $nama = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // query insert data menggunakan bahasa sql nya
    // untuk urutan parameternya ada 2 : 1.koneksi kedatabase, 2.query database nya
    $query = "INSERT INTO mahasiswa
VALUES
('','$nama','$email','$fakultas','$jurusan')
";
    // untuk mengambil data variable conn lakukan langkah yg sama pd function query, yaitu pakai global
    global $conn;
    mysqli_query($conn, $query);
    // selanjutnya kita buat si function tambah ini bisa mengembalikan angka, adapun angka ini didapat dari mysqli_affected_rows.
    // sehingga nanti bisa kita pakai saat return apakah berhasil ditambah datanya atau tidak
    return mysqli_affected_rows($conn);
}



// Function untuk menghapus data di database
function hapus($id)
{
    global $conn;
    // parameter query nya ada 2 yaitu : 1.konek db, dan string sql nya
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id= $id ");
    return mysqli_affected_rows($conn);
}



// function Untuk mengubah data di database
function ubah($data)
{
    //data nanti dikirim kedalam sini dan nanti ditangkap oleh variable
    $id = ($data["id"]);
    // fungsi htmlspecialchars : ketika data yg di inputkan oleh user, itu akan di proses dulu , jadi tidak langsung di eksekusi
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // query insert data
    // menggunakan bahasa sql nya
    // untuk urutan parameternya ada 2 : koneksi kedatabase, query database nya
    $query = "UPDATE mahasiswa SET
            id = '$id',
            nama ='$nama',
            email ='$email',
            fakultas ='$fakultas',
            jurusan ='$jurusan'
            -- untuk identifier nya menggunakan id
            WHERE id = $id
            ";



    // untuk mengambil data variable conn lakukan langkah yg sama pd function query, yaitu pakai global
    global $conn;
    mysqli_query($conn, $query);
    // selanjutnya kita buat si function tambah ini bisa mengembalikan angka, adapun angka ini didapat dari mysqli_affected_rows.
    // sehingga nanti bisa kita pakai saat return apakah berhasil ditambah datanya atau tidak
    return mysqli_affected_rows($conn);
}



// Function untuk mencari / me read data di database
function cari($keyword)
{
    // membuat varible baru dengan nama dolar query yg fungsinya untuk menampung sintax query data basenya
    $query = "SELECT * FROM mahasiswa
              WHERE 
            --   lalu where apa? atau apa yg ingin kita cari?
            --   Dan disini kami tidak menggunakan '=' , tapi menggunakan keyword di sql yg namanya 'LIKE'
            --   Perbedaan = dengan LIKE
            --   kalau '=' itu apa yg kita ketikan di keyword HARUS betul-betul sama
            --   sedangkan jika pakai 'LIKE' itu kita bisa tambahkan yg namanya whilecard. contoh kita hanya mencari 'muhammad' saja, maka nanti yg keluar bisa muhammad farhan, muhammad bagas. dsb
            --   Dan, jika pakai 'LIKE' harus ditambah keyword 'persen'
            nama LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            fakultas LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
    // lalu manfaatkan function query yg sudah kita buat di atas, kita panggil untuk di function ini
    return query($query);
}

// Function untuk registrasi di database
function registrasi($data)
{
    global $conn;

    // stripslashes : untuk jaga" apabila mungkin user memasukan karakter tertentu seperti 'backslas, dsb' , maka karakter tsb tidak akan masuk ke databases
    // strtolower : untuk memaksa huruf yg diinputkan oleh user itu huruf kecil semua, jadi apabila ada yg masukan 'Sulaiman' maka akan otomatis berubah jadi 'sulaiman'
    $username = strtolower(stripslashes($data["username"]));

    // untuk password tidak usah pakai stip atau strlower, krn mungkin aja itu password yg kalian inginkan
    // mysqli_real : untuk memungkinkan user memasukkan pw menggunakan / ada tanda kutip nya
    // dan untuk mysqli_real, itu menggunakan 2 parameter : koneksi ke databse dan data yg ditangkap dari $data
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // => cek username sudah ada atau belum di tabel database
    // pertama harus query dulu,cek ada atau tidak nama user di database yg sama dengan yg baru ingin ditamabahkan
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username'");

    if (mysqli_fetch_assoc($result)) {
        // jika hasilnya true, maka tidak boleh, harus ganti username yg lain
        echo "<script>
                alert ('username sudah terdaftar !');
                </script>";

        return false;
        // dan jgn lupa, apabila benar gagal, maka berhentikan dengan menggunakan return : false
        // apabila salah maka fungsi else yang di file registrasi akan dijalankan
        // dan fungsi" yg dibawah tidak akan dijalankan
    }


    // * Jika tahap 1 sudah lolos, maka lanjut ke tahap 2 , yaitu konfirmasi password



    // => cek konfirmasi password
    if ($password !== $password2) {
        echo " <script>
            alert('konfirmasi password tidak sesuai !');
                </script>";
        // jangan lupa, apabila ternyata salah, maka langsung berhentikan functionnya menggunakan return false
        return false;
        // apabila salah maka fungsi else yang di file registrasi akan dijalankan
    }



    // => enkripsi password
    // password_hash ada 2 parameternya : password mana yang mau diacak & menggunakan mau algoritma apa
    $password = password_hash($password, PASSWORD_DEFAULT);

    // sebetulanya sebelum password_hash ada yang namanya md5, tapi
    // $password = md5($password, PASSWORD_DEFAULT );



    // * Jika tahap 2 sudah lolos, maka lanjut ke tahap 2 , yaitu konfirmasi password 


    // => maka tambahkan user baru ke databases kita
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

    // => dan terakhir kita return fetch rows, untuk menghasilkan angka 1 jika berhasil ditambahkan, jika salah 0
    return mysqli_affected_rows($conn);
}


?>