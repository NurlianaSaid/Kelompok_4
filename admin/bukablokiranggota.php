
<?php
error_reporting(0);
session_start();
require "../koneksi.php";

// Tambahkan baris ini sebelum kueri pembaruan
$result = mysqli_query($koneksi, "SELECT status FROM tb_anggota WHERE id_anggota='$id'");
$row = mysqli_fetch_assoc($result);
echo "Status Saat Ini: " . $row['status'];
$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql = mysqli_query($koneksi, "UPDATE tb_anggota SET status='Aktif' WHERE id_anggota='$id'");

if($sql) {
    echo "<script>alert('Buka Blokir berhasil'); document.location='anggota.php'; </script>";
} else {
    echo "<script>alert('Buka Blokir Gagal'); document.location='anggota.php';</script>";
}
?>
