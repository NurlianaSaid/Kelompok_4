<?php
$koneksi = mysqli_connect("localhost", "root", "", "berita_kita") or die("Error Connection");
//buat ujicoba keneksi berhasil
if(!$koneksi){ //jika tidak koneksi,
    echo"Koneksi gagal"; //munculkan tampilan koneksi gagal

}
//jika blank maka koneksi  berhasil

?>