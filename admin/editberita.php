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
$b = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_berita where id_berita='$id'"));



$judul = mysqli_real_escape_string($koneksi, $_POST['judul']); //imputan judul
$isi = mysqli_real_escape_string($koneksi, $_POST['isi']); //deskripsi
$kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']); //deskripsi
$gambarlama = mysqli_real_escape_string($koneksi, $_POST['gambarlama']); //mana gambar lama



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
    }else{
        if(empty($foto)){ //klau fotonya tidak diganti
            $sql = mysqli_query($koneksi, "update tb_berita set judul='$judul', text_berita='$isi', id_kategori='$kategori' where id_berita='$id'");
            if($sql){
                echo "<script>alert('Edit Berhasil');document.location='berita.php'</script>";
            }else{
                $gambar_error = "<span style='color:red;'>Terjadi Kesalahan</span>";
            }
        }else{
                   unlink('../gambar' . $gambarlama);
              // simpan gambar kedalam folder berita
                    move_uploaded_file($foto, '../gambar/' . $namabaru);

                    // simpan data ke databases
                    $sql = mysqli_query($koneksi, "update tb_berita set judul='$judul', text_berita='$isi', id_kategori='$kategori', gambar='$namabaru' where id_berita='$id'");

                    if($sql){
                        echo "<script>alert('Edit Berhasil');document.location='berita.php'</script>";
                    }else{
                        $gambar_error = "<span style='color:red;'>Terjadi Kesalahan</span>";
                    }
        }
        }
      
    }

?>

<?php require "header1.php" ?>
<style>
    /* Style for form container */
.konten {
  margin: 20px auto;
  width: 70%;
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for form title */
.konten h1 {
  font-size: 24px;
  color: #333;
  margin-bottom: 20px;
}

/* Style for form input fields */
.konten input[type="text"],
.konten select,
.konten textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

/* Style for file input */
.konten input[type="file"] {
  margin-top: 10px;
}

/* Style for submit button */
.konten button[type="submit"] {
  background-color: #4caf50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

/* Style for submit button hover effect */
.konten button[type="submit"]:hover {
  background-color: #45a049;
}

/* Style for error messages */
.error {
  color: red;
  font-size: 14px;
}

/* Optional: Style for table layout */
.konten table {
  width: 100%;
}

.konten table td {
  padding: 10px;
}

</style>
        <div class="konten"> <!-- body web -->
            <div class="konten-kiri"> <!-- side bar left -->
         <h1>EDIT BERITA </h1>
        

         <form action="" method="POST" enctype="multipart/form-data">
            <table>
                    <tr>
                        <td>Judul Berita</td>
                    <td>
                         <input type="text" name="judul"  class="form-control" id="exampleInputUsername" placeholder="Masukkan Judul" size="50" class="input" value="<?= $b['judul'];?>">
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
                            if($row['id_kategori'] == $b['id_kategori']){
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
                       <textarea name="isi" cols="40" rows="4" placeholder="Isi berita"><?= $b['text_berita'];?></textarea>
                        <?= $isi_error;?>
                    </td>
                    </tr>  
                    <tr><td>
                       <input type="file" name="gambar" accept=".jpg, .png, .JEPG, .JPG, .PNG">
                        <?= $gambar_error;?>
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