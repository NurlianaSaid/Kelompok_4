<?php
session_start();
require "koneksi.php";


// Periksa apakah form login telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    // Lakukan validasi atau pengolahan lain sesuai kebutuhan
    if (empty($user) || empty($pass)) {
        // Jika username atau password kosong, berikan pesan kesalahan
        $output['status_code'] = 400;
        $output['title'] = "Gagal"; 
        $output['type'] = "error";
        $output['message'] = "Username dan password wajib diisi!";
    } else {
        // Lakukan proses login, misalnya dengan query ke database
        $passmd5 = md5($pass);
        $cekadmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$user' AND password='$passmd5'");
        $ada = mysqli_num_rows($cekadmin);

        if ($ada > 0 ) {
            $output['status_code'] = 200;
            $output['title'] = "Berhasil"; 
            $output['type'] = "success";
            $output['message'] = "Anda Berhasil login";
            $output['text'] = "Selamat Datang Admin!";

        } else {
            $output['status_code'] = 400;
            $output['title'] = "Gagal"; 
            $output['type'] = "error";
            $output['message'] = "Anda Gagal login";
            $output['text'] = "Anda Bukan Admin!";
        }
    }
    echo json_encode($output);
    exit; // Keluar dari skrip setelah mengirim respons JSON
}
?>

<style>
  body {
    background-color: #f5f5f5;
    font-family: 'Arial', sans-serif;
    margin: 0;
  }

  /* Gaya khusus untuk elemen di header */
  #header {
    background-color: #your_header_color;
    /* Gaya lainnya yang spesifik untuk header */
  }

  .login {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin-top: -130px;
    margin-top: -150px;
  }

  .loken {
    width: 100%;
    max-width: 400px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 8px;
    text-align: center; /* Center text */
    margin-top:
  }

  h2 {
    color: #ec1c23; /* Warna judul */
    font-size: 24px; /* Ukuran font judul */
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ddd;
    border-radius: 4px;
    transition: red 0.3s ease;
  }

  input[type="text"]:focus,
  input[type="password"]:focus {
    border-color: #ec1c23;
  }

  .log {
    background-color: #ec1c23;
    color: white;
    padding: 12px 15px;
    margin-top: 10px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    width: 100%;
    transition: red 0.3s ease;
  }

  .log:hover {
    background-color: #d1171b;
  }

  /* Tambahkan gambar latar belakang atau elemen dekoratif lainnya */
  .background-image {
    background-image: url('gambar/1.jpg');
    background-size: cover;
    background-position: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0.3; /* Sesuaikan kebutuhan Anda */
  }
  @media screen  and (max-width:1000px;) {
    .loken{
      margin-top:20%;
    }
  }
</style>

<?php require "header.php" ?>
<br>
<div class="background-image">
    <!-- <img src="../gambar/default.jpg" alt=""> -->
</div>

<div class="login">
    <div class="loken">
        <h2>LOGIN ADMIN</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST">
            <input type="text" name="user" id="username" placeholder="Masukkan User Admin" size="50" required>
            <input type="password" name="pass" id="password" placeholder="Masukkan Password Admin" size="50" required>
            <button class="log" type="submit">LOGIN</button>
        </form>
        <!-- <?php if (isset($login_error)) { echo "<p style='color:red;'>$login_error</p>"; } ?>
        <?php if (isset($user_error)) { echo $user_error; } ?>
        <?php if (isset($pass_error)) { echo $pass_error; } ?> -->

    </div>
</div>

<style>
    footer {
        background-color: #f8f8f8;
        padding: 20px 0;
        color: #666;
        text-align: center;
    }

    footer a {
        color: #0066cc;
        text-decoration: none;
        font-weight: bold;
    }

    footer a:hover {
        text-decoration: underline;
    }

    .footer-links {
        margin-top: 10px;
    }

    .footer-links a {
        margin: 0 10px;
    }
</style>

<footer>
    <p>&copy; 2024 LISFATIL NEWS. All rights reserved.</p>
    <div class="footer-links">
        <a href="#">Tentang Kami</a>
        <a href="#">Hubungi Kami</a>
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat dan Ketentuan</a>
    </div>
</footer>

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            // Panggil fungsi ajak_login saat formulir disubmit
            $('form').submit(function(e){
                e.preventDefault(); // Mencegah aksi default submit formulir
                ajak_login(); // Panggil fungsi ajak_login
            });

            // Fungsi untuk mengirimkan data login menggunakan AJAX
            function ajak_login() {
                var user_name = $('#username').val();
                var pwd = $('#password').val();

                if(user_name.length > 0 && pwd.length > 0){
                    $.ajax({
                        url: "<?php echo $_SERVER['PHP_SELF']; ?>",
                        type: "post",
                        data : {
                            user: user_name,
                            pass: pwd
                        },
                        success:function(result){
                            var hasil = JSON.parse(result);
                            if(hasil.status_code === 200) {
                                Swal.fire({
                                    title: hasil.title,
                                    text: hasil.message,
                                    icon: hasil.type,
                                    text: hasil.text
                                     }).then((result) => {
                                // Jika pengguna menekan OK, arahkan mereka ke halaman tertentu
                                if (result.isConfirmed) {
                                    window.location.href = "admin/index.php";
                                }
                                });
                            } else {
                                Swal.fire({
                                    title: hasil.title,
                                    text: hasil.message,
                                    icon: hasil.type,
                                    text: hasil.text
                                });
                            }
                        }
                    });
                }
            }
        });
    </script>
</body>
</html>