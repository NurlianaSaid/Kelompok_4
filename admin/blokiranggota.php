
<?php
error_reporting(E_ALL);
session_start();
require "../koneksi.php";

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql = mysqli_query($koneksi, "UPDATE tb_anggota SET status='Tidak Aktif' WHERE id_anggota='$id'");

if($sql) {
    echo "<script>alert('Blokir berhasil'); document.location='anggota.php'; </script>";
}else {
    echo "<script>alert('Blokir Gagal: " . mysqli_error($koneksi) . "'); document.location='anggota.php';</script>";
}
?>
