// ambil elemen" yg dibutuhkan
const keyword = document.getElementById("keyword");
const cari = document.getElementById("cari");
const container = document.getElementById("ubah-ajax");

// tambahkan event ketika keyword diketik
keyword.addEventListener("keyup", function () {
  // buat object ajax
  const ajax = new XMLHttpRequest();

  // cek kesiapan ajax
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      container.innerHTML = ajax.responseText;
    }
  };

  //  eksekusi ajax
  //  ada tiga parameter : request method nya, sumber data nya dari mana, dan true(asyncronus) / false(syncronus)
  ajax.open("GET", "../ajax/mahasiswa.php?keyword=" + keyword.value, true);
  ajax.send();
});
