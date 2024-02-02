<?php
error_reporting(0);
session_start();
require "../koneksi.php";

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$ceknama = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_berita where id_berita='$id'"));
$namagambar = $ceknama['gambar'];

unlink('../gambar' . $namagambar);
$sql = mysqli_query($koneksi, "delete from tb_berita where id_berita='$id'"); //hapus dari tabel
    if($sql){
        echo "<script>alert('Hapus Berhasil');document.location='berita.php'</script>";
    }else{
       echo "<script>alert('Hapus Gagal');document.location='berita.php'</script>";
    }
    
    header('location: berita.php?m=1')
?>
