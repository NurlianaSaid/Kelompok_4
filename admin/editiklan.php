<?php 
error_reporting(0);
session_start();
require "../koneksi.php";

$sesiadmin = $_SESSION['owder']; //sesi login

if(!isset($sesiadmin)){
    header('location:index1.php'); //redirect atau location
}
$admin = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_admin where id_admin='$sesiadmin'"));

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$b = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_iklan where id_iklan='$id'"));


$judul = mysqli_real_escape_string($koneksi, $_POST['judul']); //imputan judul
$isi = mysqli_real_escape_string($koneksi, $_POST['isi']); //deskripsi
$tglmulai = mysqli_real_escape_string($koneksi, $_POST['mulai']); //deskripsi
$tglselesai = mysqli_real_escape_string($koneksi, $_POST['selesai']); //deskripsi
$link = mysqli_real_escape_string($koneksi, $_POST['link']); //deskripsi
$status = mysqli_real_escape_string($koneksi, $_POST['status']); //deskripsi
$gambarlama = mysqli_real_escape_string($koneksi, $_POST['gambarlama']); //mana gambar lama



$foto = $_FILES['gambar']['tmp_name']; //temporary
$namafoto = $_FILES['gambar']['name']; //nama gambar
$tgl = date('Y-m-d H:i:s');

$ext = strtolower(end(explode(".", $namafoto)));
$namabaru = $judul .'.'. $ext;


if(isset($_POST['submit'])){
    if($judul == ""){
        $judul_error = "<span style='color:red;'>Judul wajib diisi</span>";
    }elseif($tglmulai == ""){
        $tglmulai_error = "<span style='color:red;'>Tanggal wajib diisi</span>";
    }elseif($tglselesai == ""){
    $tglselesai_error = "<span style='color:red;'>Tanggal wajib diisi</span>";
}elseif($isi == ""){
        $isi_error = "<span style='color:red;'>Deskripsi wajib diisi</span>";
    }else{
        if(empty($foto)){ //klau fotonya tidak diganti
            $sql = mysqli_query($koneksi, "update tb_iklan set nm_perusahaan='$judul', isi_iklan='$isi', tgl_mulai='$tglmulai', tgl_selesai='$tglselesai', link='$link', status='$status' where id_iklan='$id'");
            if($sql){
                echo "<script>alert('Edit Berhasil');document.location='iklan.php'</script>";
            }else{
                $gambar_error = "<span style='color:red;'>Terjadi Kesalahan</span>";
            }
        }else{
                   unlink('../gambar' . $gambarlama);
              // simpan gambar kedalam folder berita
                    move_uploaded_file($foto, '../gambar/' . $namabaru);

                    // simpan data ke databases
                    $sql = mysqli_query($koneksi, "update tb_iklan set gambar='$namabaru' , nm_perusahaan='$judul', isi_iklan='$isi', tgl_mulai='$tglmulai', tgl_selesai='$tglselesai', link='$link' status='$status' where id_iklan='$id'");
                    if($sql){
                        echo "<script>alert('Edit Berhasil');document.location='iklan.php'</script>";
                    }else{
                        $gambar_error = "<span style='color:red;'>Terjadi Kesalahan</span>";
                    }
        }
        }
      
    }

?>

<?php require "header1.php" ?>

        <div class="konten"> <!-- body web -->
            <div class="konten-kiri"> <!-- side bar left -->
         <h1>EDIT IKLAN </h1>
        

         <form action="" method="POST" enctype="multipart/form-data">
            <table>
            <tr>
                        <td>Judul Iklan</td>
                    <td>
                         <input type="text" name="judul"  class="input"  placeholder="Masukkan Judul" size="50" class="input" value="<?= $b['nm_perusahaan'];?>">
                         <?= $judul_error;?>
                    </td>
                </tr>
                <tr>
                        <td>Tanggal Mulai</td>
                    <td>
                         <input type="date" name="mulai"  placeholder="Tanggal Mulai" class="input"  placeholder="Masukkan Judul" size="50" class="input" value="<?= $b['tgl_mulai'];?>">
                         <?= $mulai_error;?>
                    </td>
                </tr>
                <tr>
                        <td>Tanggal Selesai</td>
                    <td>
                         <input type="date" name="selesai"  class="input"  placeholder="Tanggal Selesai" size="50" class="input" value="<?= $b['tgl_selesai'];?>">
                         <?= $selesai_error;?>
                    </td>
                </tr>
                    <tr>
                    <td>Deskripsi Iklan</td>   
                    <td>
                       <textarea name="isi" cols="40" rows="4" placeholder="Isi Iklan"><?= $b['isi_iklan'];?></textarea>
                        <?= $isi_error;?>
                    </td>
                    </tr>  
                    <tr>
                        <td>Link Iklan</td>
                    <td>
                         <input type="text" name="link"  class="input"  placeholder="Link Iklan" size="50" class="input" value="<?= $b['link'];?>">
                         <?= $link_error;?>
                    </td>
                </tr>
                    <tr><td>Gambar Iklan</td><td>
                       <input type="file" name="gambar" accept=".jpg, .png, .JEPG, .JPG, .PNG">
                        <?= $gambar_error;?>
                    </td>
                    </tr>  
                    <tr>
                        <td>Status Iklan</td>
                    <td>
                       <select name="status" id="">
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>

                       </select>
                    </td>
                    </tr>  
                    <tr>
                    <td>&nbsp;</td>   
                    <td>  
                    <input type="hidden" name="gambarlama"   value="<?= $b['gambar'];?>">
                        <button type="submit" name="submit" >SIMPAN</button>
                    </td></tr>  
            </table>
          </form>

            </div>
            
            <div class="konten-kanan"></div> <!-- side bar right -->
        </div>
        <?php require "../footer.php" ?>