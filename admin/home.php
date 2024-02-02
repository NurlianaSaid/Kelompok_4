<?php 
session_start();
error_reporting(0);

require "../koneksi.php";
$sesiadmin = $_SESSION['owder']; //sesi login

if(!isset($sesiadmin)){
    header('location:login.php'); //redirect atau location
}
$admin = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_admin where id_admin='$sesiadmin'"));

?>

<?php require "header1.php" ?>

        <div class="konten"> <!-- body web -->
            <div class="konten-kiri"> <!-- side bar left -->
         <h1>Selamat datang <?= $admin['nama_lengkap']; ?> [<?= $admin['username']; ?>]di ruang admin ! </h1>
            </div>
            
            <div class="konten-kanan"></div> <!-- side bar right -->
        </div>
        <?php require "../footer.php" ?>