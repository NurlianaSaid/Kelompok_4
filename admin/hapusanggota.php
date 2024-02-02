<?php
error_reporting(0);
session_start();
require "../koneksi.php";

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$ceknama = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_berita where id_berita='$id'"));
$namagambar = $ceknama['gambar'];

unlink('../../gambar' . $namagambar);
$sql = mysqli_query($koneksi, "delete from tb_anggota where id_anggota='$id'"); //hapus dari tabel
if ($sql) {
    echo "<script>
        var konfirmasi = confirm('Apakah Anda yakin ingin menghapus?');
        if (konfirmasi) {
            document.location = 'anggota.php';
        } else {
            // Handle jika pengguna memilih untuk tidak pindah halaman atau melakukan tindakan lainnya
            console.log('Pengguna memilih untuk tidak menghapus');
        }
    </script>";
    }else{
       echo "<script>alert('Hapus Gagal');document.location='anggota.php'</script>";
    }
?>
