<?php 
error_reporting(0);
session_start();
require "../koneksi.php";

$sesiadmin = $_SESSION['owder']; //sesi login

if(!isset($sesiadmin)){
    header('location:index1.php'); //redirect atau location
}
$admin = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_admin where id_admin='$sesiadmin'"));

$judul = mysqli_real_escape_string($koneksi, $_POST['judul']); //imputan judul
$isi = mysqli_real_escape_string($koneksi, $_POST['isi']); //deskripsi
$kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']); //deskripsi


$foto = $_FILES['gambar']['tmp_name']; //temporary
$namafoto = $_FILES['gambar']['name']; //nama gambar
$tgl = date('Y-m-d H:i:s');

$ext = strtolower(end(explode(".", $namafoto)));
$namabaru = $judul .'.'. $ext;


if(isset($_POST['submit'])){
    if($judul == ""){
        $judul_error = "<span style='color:red;'>Judul wajib diisi</span>";
    }elseif($kategori == ""){
        $kategori_error = "<span style='color:red;'>Kategori wajib dipilih</span>";
    }elseif($isi == ""){
        $isi_error = "<span style='color:red;'>Deskripsi wajib diisi</span>";
    }elseif(empty($foto)){
        $gambar_error = "<span style='color:red;'>Gambar wajib diisi</span>";
    }else{
        // simpan gambar kedalam folder berita
        move_uploaded_file($foto, '../../gambar/' . $namabaru);

        // simpan data ke databases
        $sql = mysqli_query($koneksi, "insert into tb_berita (judul, text_berita,id_admin,id_kategori,tgl_posting,dilihat,gambar)
        values ('$judul','$isi','$sesiadmin','$kategori','$tgl','1','$namabaru')");
        if($sql){
            echo "<script>alert('Input Berhasil');document.location='berita.php'</script>";
        }else{
            $gambar_error = "<span style='color:red;'>Terjadi Kesalahan</span>";
        }
    }
}
?>

<?php require "header1.php"?>

        <div class="konten"> <!-- body web -->
            <div class="konten-kiri"> <!-- side bar left -->
         <h1>TAMBAH BERITA </h1>
         

         <form action="" method="POST" enctype="multipart/form-data">
            <table>
                    <tr>
                        <td>Judul Berita</td>
                    <td>
                         <input type="text" name="judul"  class="form-control" id="exampleInputUsername" placeholder="Masukkan Judul" size="50" class="input" value="<?= $judul;?>">
                         <?= $judul_error;?>
                    </td>
                </tr>
                <tr>
                <td>Kategori Berita</td>    
                <td>
                     <select name="kategori">
                     <option value="">--- Pilih Kategori ---</option>
                        <?php 
                        $sql = mysqli_query($koneksi, "select * from tb_kategori");
                        while($row = mysqli_fetch_array($sql)){
                            if($row['id_kategori'] == $kategori){
                                ?>
                                <option value="<?= $row['id_kategori'];?>" selected="selected"><?= $row['kategori'];?></option>
                            <?php } else { ?>
                                <option value="<?= $row['id_kategori'];?>"><?= $row['kategori'];?></option>
                             <?php  
                            }
                            } ?>
                    </select>
                         <?= $kategori_error;?>
                    </td>
                </tr>
                    <tr>
                    <td>Deskripsi Berita</td>   
                    <td>
                       <textarea name="isi" cols="40" rows="4" placeholder="Isi berita"><?= $isi;?></textarea>
                        <?= $isi_error;?>
                    </td>
                    </tr>  
                    <tr><td>Sampul Iklan</td><td>
                       <input type="file" name="gambar" accept=".jpg, .png, .JEPG, .JPG, .PNG">
                        <?= $gambar_error;?>
                    </td>
                    </tr>  
                    <tr>
                    <td>&nbsp;</td>   
                    <td>  
                        <button type="submit" name="submit" >SIMPAN</button>
                    </td></tr>  
            </table>
          </form>

            </div>
            
            <div class="konten-kanan"></div> <!-- side bar right -->
        </div>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="color: white; font-size:30px;">
                <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->
      </div>
      <?php require "../footer.php" ?>
    </div>

  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>

