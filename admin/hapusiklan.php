<?php
error_reporting(0);
session_start();
require "../koneksi.php";

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$ceknama = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_iklan where id_iklan='$id'"));
$namagambar = $ceknama['gambar'];

unlink('../gambar/' . $namagambar); 
    // File berhasil dihapus
    $sql = mysqli_query($koneksi, "delete from tb_iklan where id_iklan='$id'");
    if ($sql) {
        echo "<script>alert('Hapus Berhasil');document.location='iklan.php'</script>";
    } else {
        echo "<script>alert('Hapus Gagal');document.location='iklan.php'</script>";
    }

?>
