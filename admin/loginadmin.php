<?php 
error_reporting(0);
session_start();
require "../koneksi.php";
// include "../fungsi/fungsi.php"; //include file fungsi

$sesiadmin = $_SESSION['owder']; //sesi login
if (isset($sesiadmin)) { //jika sudah login
    header("Location: home.php"); //redirect
    exit();
}

$user = $_POST['user']; //imputan user
$pass = $_POST['pass']; //imputan password

$passmd5 = md5($pass); //pass yang di md5

if(isset($_POST['submit'])){
    if($user == ""){
        $user_error = "<span style='color:white;'>User wajib diisi</span>";
    }elseif($pass == ""){
        $pass_error = "<span style='color:white;'>Password wajib diisi</span>";
    }else{
        $cekadmin = mysqli_query($koneksi, "SELECT * FROM tb_admin where username='$user' and password='$passmd5'");
        $row = mysqli_fetch_array($cekadmin);
        $idadmin = $row['id_admin']; //ambil id admin dari tb_admin
        $ada = mysqli_num_rows($cekadmin);
        if($ada > 0){

        //     $row = mysqli_fetch_assoc($result);
        // $_SESSION['username'] = $row['username'];
        // header("Location: home.php");
        // exit();
            $_SESSION['webportal'] = $user;
            $_SESSION['owder'] = $idadmin; //jadikan session
          echo "<script>
          alert('Selamat Datang !');document.location='home.php'
          </script>";

        }else{
            $pass_error = "<span style='color:white;'>User & Password Salah!</span>";
        }
    }
}

?>

    <div id="container"> <!-- kerangka web / bingkai -->
       <?php require "header1.php"; ?>
        <div class="konten"> <!-- body web -->
            <div class="konten-kiri"> <!-- side bar left -->
          <form action="" method="POST">
            <table class="login">
                    <tr><th><h2>LOGIN ADMIN</h2>
                    </th></tr>
                    <tr><td>
                         <input type="text" name="user"  class="form-control" id="exampleInputUsername" placeholder="Masukkan User Admin" size="50" class="input" value="<?= $user;?>">
                         <?= $user_error;?>
                    </td></tr>
                    <tr><td>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword" placeholder="Masukkan Password Admin" size="50" class="input" >  
                        <?= $pass_error;?>
                    </td></tr>  
                    <tr><td>  
                        <button type="submit" name="submit" >LOGIN</button>
                    </td></tr>  
            </table>
          </form>
            </div>
            <div class="konten-kanan"></div> <!-- side bar right -->
        </div>
<?php require "footer.php" ?>