<?php
session_start();
error_reporting(0); // Menonaktifkan pelaporan error

require "../koneksi.php";

if(isset($_POST['submit'])){
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $sql = "INSERT INTO tb_anggota (nama, email, password) VALUES ('$nama', '$email', '$password')";

    // Jalankan kueri SQL
    if ($koneksi->query($sql) === TRUE) {
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Pekerjaan Anda telah disimpan",
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "redirect_page.php"; // Ganti redirect_page.php dengan halaman yang sesuai
                    }
                });
              </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Tutup koneksi ke database
$koneksi->close();


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
        $passmd5 = ($pass);
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>


<style>

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}
body{
    display:flex;
    justify-content:center;
    align-items:center;
    background:#081b29;

}
.wrapper {
    position:relative;
    width:750px;
    height:450px;
    background:#081b29;
    border:2px solid rgb(234, 88, 88);
    box-shadow: 0 0 25px rgb(234, 88, 88) ;
    overflow: hidden;
    margin:30px auto;
    justify-content:center;
    align-items:center;

}
.wrapper .form-box{
    position:absolute;
    top:0;
    width:50%;
    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
}
.wrapper .form-box.login {
    left:0;
    padding:0 60px 0 40px;
   
}

.wrapper .form-box.login .animation {
    transform: translateX(0);
    opacity:1;
    filter:blur(0);
    transition: .7s ease;
    transition-delay: calc(.1s * var(--j));

}

.wrapper.active .form-box.login .animation {
    transform: translateX(-120%);
    opacity:0;
    filter:blur(10px);
    transition-delay: calc(.1s * var(--i));
}
.wrapper .form-box.register{
    right:0;
     padding:0 40px 0 60px;
     pointer-events: none;
}

.wrapper.active .form-box.register{
    pointer-events: auto;
}
.wrapper .form-box.register .animation{
     transform: translateX(120%);
     opacity:0;
    filter:blur(10px);
    transition: .7s ease;
    transition-delay: calc(.1s * var(--j));
}

.wrapper.active .form-box.register .animation{
    transform: translateX(-0);
    opacity:1;
    filter:blur(0);
    transition-delay: calc(.1s * var(--i));
}

.form-box h2{
    font-size:32px;
    color:#fff;
    text-align:center; 
}
.form-box .input-box{
    position:relative;
    width:100%;
    height:50px;
    margin:25px 10px;
}

.input-box input{
    width:100%;
    height:100%;
    background: transparent;
    /* background:red; */
    border:none;
    outline:none;
    border-bottom:2px solid #fff;
    padding-right:23px;
    font-size:16px;
    color:#fff;
    font-weight:500;
    transition: .5s;
   
}

.input-box  input:focus,
.input-box input:valid {
    border-bottom-color:rgb(234, 88, 88);
}

.input-box label {
    position:absolute;
    top:50%;
    left:0;
    transform: translateY(-50%);
    font-size:16px;
    color:#fff;
    pointer-events:none;
    transition:.5s;
}

/* membuat username dan password bergerak */
.input-box  input:focus~label,
.input-box input:valid~label {
    top:-5px;
    color:rgb(234, 88, 88);
}

.input-box ion-icon {
    position:absolute;
    top:50%;
    right:0;
    transform:translateY(-50%);
    font-size:18px;
    color:#fff;
    transition: .5s;
}

.input-box  input:focus~ion-icon,
.input-box input:valid~ion-icon {
    color:rgb(234, 88, 88);
}
/* untuk tombol login */
 .btn{
    position:relative;
    width:100%;
    height:45px;
    background:transparent;
    border:2px solid rgb(234, 88, 88);
    outline:none;
    border-radius:40px;
    cursor:pointer;
    /* pointer-events: #0ef; */
    font-size:16px;
    color:#fff;
    font-weight:600;
    z-index:1;
    overflow:hidden;

}

.btn::before {
    content:'';
    position:absolute;
    top:-100%;
    left:0;
    width:100%;
    height:300%;
    background:linear-gradient(#290808, rgb(235, 108, 108),#e36060, red);
    z-index:-1;
    transition: .5s;
}
.btn:hover:before{
    top:0;
}
.form-box .logreg-link{
    font-size:14.5px;
    color:#fff;
    text-align:center;
    margin:20px 0 10px;
}

.logreg-link p a{
    color:rgb(234, 88, 88);
    text-decoration: none;
    font-weight:600;
}
.logreg-link p a:hover{
    text-decoration: underline;
}


.wrapper .info-text {
    position:absolute;
    top:0;
    width:50%;
    height:100%;
    display:flex;
    flex-direction: column;
    justify-content: center;
}

.wrapper .info-text.login{
    right:0;
    text-align:right;
    padding: 0 40px 60px 150px;
} 


.wrapper .info-text.login .animation {
    transform: translateX(0);
    opacity:1;
    filter:blur(0);
    transition: .7s ease;
    transition-delay: calc(.1s * var(--j));
}
.wrapper.active .info-text.login .animation {
    transform: translateX(120%);
    opacity:0;
    filter:blur(10px);
    transition-delay: calc(.1s * var(--i));
}

.wrapper .info-text.register{
    left:0;
    text-align:left;
    padding:0 150px 60px 40px;
    pointer-events: none;

}
.wrapper.active .info-text.register{
    pointer-events: auto;
}

.wrapper .info-text.register .animation{
    transform: translateX(-120%);
    opacity:0;
    filter:blur(10px);
    transition:.7s ease;
    transition-delay: calc(.1s * var(--j));
}

.wrapper.active .info-text.register .animation{
    transform: translateX(0);
    opacity:1;
    filter:blur(0);
    transition-delay: calc(.1s * var(--i));
}

.info-text h2{
    font-size:36px;
    color:#fff;
    line-height:1.3s;
    text-transform:uppercase;

}
.info-text p{
    font-size:16px;
    color:#fff;
}


/* ini untuk samping merah */
.wrapper .bg-animate {
     position:absolute;
     top:-4px;
     right:0;
     width:850px;
     height:600px;
     background: linear-gradient(45deg, #290809,rgb(234, 88, 88));
     border-bottom: 3px solid rgb(234, 88, 88);
     transform: rotate(10deg) skewY(40deg);
     transform-origin: bottom right;
     transition: 1.5s ease;
     transition-delay: 1.6s;
}

.wrapper.active .bg-animate{
     transform: rotate(0) skewY(0);
     transition-delay: .5s;
     

}

/* ini untuk register nya yang membagi 2 */
.wrapper .bg-animate2 {
    position:absolute;
    top:100%;
    left:250px;
    width:850px;
    height:700px;
    background: #081b29;
    border-top: 3px solid rgb(234, 88, 88);
    transform: rotate(0) skewY(0);
    transform-origin: bottom left;
    transition: 1.5s ease;
    transition-delay: .5s;
}

.wrapper.active .bg-animate2{
    transform: rotate(-11deg) skewY(-41deg);
    transition-delay: 1.2s;
}


    @keyframes marqueeAnimation {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            background:rgb(59,15,23);
            /* background-color: #ec1c23; */
            border-color: #ec1c23;
            color: white;
            padding: 10px; /* Berikan ruang di sekitar teks */
            border-radius: 50px;
        }
        .carousel img {
    height: 500px;
    width: 500px;
    object-fit: cover; 
}

    .headline {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }
        .marquee-content {
            display: inline-block;
            animation: marqueeAnimation 15s linear infinite;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek box-shadow pada tombol */
        }

        .form-control {
    background-color: #ffffff;
    border: 1px solid #ced4da;
    border-radius: 4px;
    width: 300px;
    width: 680px;
    border-radius: 50px;
    color: #000; /* Tambahkan warna teks */
}

.btn-outline-success {
    background-color: #28a745; /* Ubah ke warna yang berbeda */
    border: 1px solid #28a745;
    border-radius: 4px;
    color: white;
    margin-right: 10px; /* Sesuaikan margin jika diperlukan */
    margin-left: 10px;
}


        .container.text-center {
        background-color: #f8f9fa; /* Warna latar belakang */
        padding: 10px; /* Ruang di sekitar konten */
        border-radius: 8px; /* Border radius untuk sudut elemen */
    }

    /* Gaya untuk setiap elemen kolom */
    .col {
        padding: 10px; /* Ruang di sekitar teks */
    }

    /* Gaya untuk tautan navigasi */
    .text-dark {
        color: #343a40 !important; /* Warna teks, !important digunakan untuk mengatasi spesifisitas */
        font-weight: bold; /* Ketebalan teks */
        text-decoration: none; /* Tanpa dekorasi garis bawah */
        transition: color 0.3s; /* Transisi warna saat dihover */
    }

    /* Gaya untuk tautan saat dihover */
    .text-dark:hover {
        color: red !important; /* Warna teks saat dihover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding:10px;
    }
    .navbar-brand {
        font-size: 2rem; /* Ukuran font */
        font-weight: bold; /* Ketebalan teks */
        color: #ff5c00; /* Warna teks */
        text-decoration: none; /* Tanpa dekorasi garis bawah */
    }

    .navbar-brand span {
        color: #0066cc; /* Warna teks untuk span */
    }
        /* Penyesuaian gaya untuk meniru Liputan6 */
        .container {
        max-width: 1200px;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.5rem;
    }

    .card-text {
        color: #555;
    }

    .btn-primary {
        background-color: #ec1c23;
        border-color: #ec1c23;
    }

    .btn-primary:hover {
        background-color: #d1171b;
        border-color: #d1171b;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .container {
    max-width: 1200px;
    margin: auto; /* Mengatur margin otomatis agar konten berada di tengah */
}

/* Pada aturan media query Anda */
@media screen and (max-width: 768px) {
    .wrapper {
    position:relative;
    width:90%;
    height:450px;
    background:#081b29;
    border:2px solid rgb(234, 88, 88);
    box-shadow: 0 0 25px rgb(234, 88, 88) ;
    overflow: hidden;
    margin:20px auto;
    justify-content:center;
    align-items:center;

}
.wrapper .form-box{
    position:absolute;
    top:0;
    width:50%;
    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
}
.wrapper .form-box.login {
    left:0;
    padding:0 40px 0 20px;
   
}

.wrapper .form-box.login .animation {
    transform: translateX(0);
    opacity:1;
    filter:blur(0);
    transition: .7s ease;
    transition-delay: calc(.1s * var(--j));

}

.wrapper.active .form-box.login .animation {
    transform: translateX(-120%);
    opacity:0;
    filter:blur(10px);
    transition-delay: calc(.1s * var(--i));
}
.wrapper .form-box.register{
    right:0;
     padding:0 20px 0 40px;
     pointer-events: none;
}

.wrapper.active .form-box.register{
    pointer-events: auto;
}
.wrapper .form-box.register .animation{
     transform: translateX(120%);
     opacity:0;
    filter:blur(10px);
    transition: .7s ease;
    transition-delay: calc(.1s * var(--j));
}

.wrapper.active .form-box.register .animation{
    transform: translateX(-0);
    opacity:1;
    filter:blur(0);
    transition-delay: calc(.1s * var(--i));
}

.form-box h2{
    font-size:20px;
    color:#fff;
    text-align:center; 
}
.form-box .input-box{
    position:relative;
    width:90%;
    height:40px;
    margin:15px auto;
}

.input-box label {
    position:absolute;
    top:40%;
    left:0;
    transform: translateY(-50%);
    font-size:12px;
    color:#fff;
    pointer-events:none;
    transition:.5s;
}

.form-box .logreg-link{
    font-size:12.5px;
    color:#fff;
    text-align:center;
    margin:20px 0 10px;
}

.logreg-link p a{
    color:rgb(234, 88, 88);
    text-decoration: none;
    font-weight:600;
}
.logreg-link p a:hover{
    text-decoration: underline;
}


.wrapper .info-text {
    position:absolute;
    top:0;
    width:50%;
    height:100%;
    display:flex;
    flex-direction: column;
    justify-content: center;
}

.wrapper .info-text.login{
    right:0;
    text-align:right;
    padding: 0 40px 60px 150px;
} 


.wrapper .info-text.login .animation {
    transform: translateX(0);
    opacity:1;
    filter:blur(0);
    transition: .7s ease;
    transition-delay: calc(.1s * var(--j));
}
.wrapper.active .info-text.login .animation {
    transform: translateX(120%);
    opacity:0;
    filter:blur(10px);
    transition-delay: calc(.1s * var(--i));
}

.wrapper .info-text.register{
    left:0;
    text-align:left;
    padding:0 150px 60px 40px;
    pointer-events: none;

}
.wrapper.active .info-text.register{
    pointer-events: auto;
}

.wrapper .info-text.register .animation{
    transform: translateX(-120%);
    opacity:0;
    filter:blur(10px);
    transition:.7s ease;
    transition-delay: calc(.1s * var(--j));
}

.wrapper.active .info-text.register .animation{
    transform: translateX(0);
    opacity:1;
    filter:blur(0);
    transition-delay: calc(.1s * var(--i));
}

.info-text h2{
    font-size:18px;
    color:#fff;
    line-height:1.3s;
    text-transform:uppercase;
    margin: 10px auto;

}


/* ini untuk samping merah */
.wrapper .bg-animate {
     position:absolute;
     top:-4px;
     right:-20px;
     width:850px;
     height:600px;
     background: linear-gradient(45deg, #290809,rgb(234, 88, 88));
     border-bottom: 3px solid rgb(234, 88, 88);
     transform: rotate(10deg) skewY(40deg);
     transform-origin: bottom right;
     transition: 1.5s ease;
     transition-delay: 1.6s;
}

.wrapper.active .bg-animate{
     transform: rotate(0) skewY(0);
     transition-delay: .5s;
     

}

/* ini untuk register nya yang membagi 2 */
.wrapper .bg-animate2 {
    position:absolute;
    top:100%;
    left:200px;
    width:850px;
    height:700px;
    background: #081b29;
    border-top: 3px solid rgb(234, 88, 88);
    transform: rotate(0) skewY(0);
    transform-origin: bottom left;
    transition: 1.5s ease;
    transition-delay: .5s;
}

.wrapper.active .bg-animate2{
    transform: rotate(-11deg) skewY(-41deg);
    transition-delay: 1.2s;
}


        .form-control {
    background-color: #ffffff;
    border: 1px solid #ced4da;
    border-radius: 4px;
    width: 300px;
    width: 680px;
    border-radius: 50px;
    color: #000; /* Tambahkan warna teks */
}

.btn-outline-success {
    background-color: #28a745; /* Ubah ke warna yang berbeda */
    border: 1px solid #28a745;
    border-radius: 4px;
    color: white;
    margin-right: 10px; /* Sesuaikan margin jika diperlukan */
    margin-left: 10px;
}



 
}
@media screen and (max-width: 680px){
     /* ini untuk samping merah */
.wrapper .bg-animate {
     position:absolute;
     top:-4px;
     right:-90px;
     width:850px;
     height:600px;
     background: linear-gradient(45deg, #290809,rgb(234, 88, 88));
     border-bottom: 3px solid rgb(234, 88, 88);
     transform: rotate(10deg) skewY(40deg);
     transform-origin: bottom right;
     transition: 1.5s ease;
     transition-delay: 1.6s;
     
}

.wrapper.active .bg-animate{
     transform: rotate(0) skewY(0);
     transition-delay: .5s;
     

}

/* ini untuk register nya yang membagi 2 */
.wrapper .bg-animate2 {
    position:absolute;
    top:100%;
    left:170px;
    width:850px;
    height:700px;
    background: #081b29;
    border-top: 3px solid rgb(234, 88, 88);
    transform: rotate(0) skewY(0);
    transform-origin: bottom left;
    transition: 1.5s ease;
    transition-delay: .5s;
}

.wrapper.active .bg-animate2{
    transform: rotate(-11deg) skewY(-41deg);
    transition-delay: 1.2s;
}

}
@media screen and (max-width: 600px){
    
.form-box h2{
    font-size:16px;
    color:#fff;
    text-align:center; 
}
.form-box .input-box{
    position:relative;
    width:90%;
    height:40px;
    margin:15px auto;
}




.input-box label {
    position:absolute;
    top:40%;
    left:0;
    transform: translateY(-50%);
    font-size:10px;
    color:#fff;
    pointer-events:none;
    transition:.5s;
}


.input-box ion-icon {
    position:absolute;
    top:40%;
    right:0;
    transform:translateY(-50%);
    font-size:12px;
    color:#fff;
    transition: .5s;
}

.wrapper .info-text {
    position:absolute;
    top:0;
    width:50%;
    height:100%;
    display:flex;
    flex-direction: column;
    justify-content: center;
}

.wrapper .info-text.login{
    right:0;
    text-align:right;
    padding: 0 10px 20px 100px;
} 


.wrapper .info-text.login .animation {
    transform: translateX(0);
    opacity:1;
    filter:blur(0);
    transition: .7s ease;
    transition-delay: calc(.1s * var(--j));
}
.wrapper.active .info-text.login .animation {
    transform: translateX(120%);
    opacity:0;
    filter:blur(10px);
    transition-delay: calc(.1s * var(--i));
}

.wrapper .info-text.register{
    left:0;
    text-align:left;
    padding:0 150px 60px 40px;
    pointer-events: none;

}
.wrapper.active .info-text.register{
    pointer-events: auto;
}

.wrapper .info-text.register .animation{
    transform: translateX(-120%);
    opacity:0;
    filter:blur(10px);
    transition:.7s ease;
    transition-delay: calc(.1s * var(--j));
}

.wrapper.active .info-text.register .animation{
    transform: translateX(0);
    opacity:1;
    filter:blur(0);
    transition-delay: calc(.1s * var(--i));
}

.info-text h2{
    font-size:10px;
    color:#fff;
    line-height:1.3s;
    text-transform:uppercase;
    margin: 10px auto;

}
.info-text p{
    font-size:12px;
    color:#fff;
}


/* ini untuk samping merah */
.wrapper .bg-animate {
     position:absolute;
     top:-4px;
     right:-20%;
     width:850px;
     height:600px;
     background: linear-gradient(45deg, #290809,rgb(234, 88, 88));
     border-bottom: 3px solid rgb(234, 88, 88);
     transform: rotate(10deg) skewY(40deg);
     transform-origin: bottom right;
     transition: 1.5s ease;
     transition-delay: 1.6s;
}

.wrapper.active .bg-animate{
     transform: rotate(0) skewY(0);
     transition-delay: .5s;
     

}

/* ini untuk register nya yang membagi 2 */
.wrapper .bg-animate2 {
    position:absolute;
    top:100%;
    left:200px;
    width:850px;
    height:700px;
    background: #081b29;
    border-top: 3px solid rgb(234, 88, 88);
    transform: rotate(0) skewY(0);
    transform-origin: bottom left;
    transition: 1.5s ease;
    transition-delay: .5s;
}

.wrapper.active .bg-animate2{
    transform: rotate(-11deg) skewY(-41deg);
    transition-delay: 1.2s;
}


    @keyframes marqueeAnimation {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            background:rgb(59,15,23);
            /* background-color: #ec1c23; */
            border-color: #ec1c23;
            color: white;
            padding: 10px; /* Berikan ruang di sekitar teks */
            border-radius: 50px;
        }
        .carousel img {
    height: 500px;
    width: 500px;
    object-fit: cover; 
}

    .headline {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }
        .marquee-content {
            display: inline-block;
            animation: marqueeAnimation 15s linear infinite;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek box-shadow pada tombol */
        
}
}
@media screen and (max-width: 550px){
    .info-text h2{
    font-size:18px;
    color:#fff;
    line-height:1.3s;
    text-transform:uppercase;
    margin: 10px auto;
}

/* ini untuk samping merah */
.wrapper .bg-animate {
     position:absolute;
     top:-4px;
     right:-30%;
     width:850px;
     height:600px;
     background: linear-gradient(45deg, #290809,rgb(234, 88, 88));
     border-bottom: 3px solid rgb(234, 88, 88);
     transform: rotate(10deg) skewY(40deg);
     transform-origin: bottom right;
     transition: 1.5s ease;
     transition-delay: 1.6s;
}

.wrapper.active .bg-animate{
     transform: rotate(0) skewY(0);
     transition-delay: .5s;
     

}

/* ini untuk register nya yang membagi 2 */
.wrapper .bg-animate2 {
    position:absolute;
    top:100%;
    left:200px;
    width:900px;
    height:700px;
    background: #081b29;
    border-top: 3px solid rgb(234, 88, 88);
    transform: rotate(0) skewY(0);
    transform-origin: bottom left;
    transition: 1.5s ease;
    transition-delay: .5s;
}

}

    
</style>
<body class="px-0">




    <div class="container text-center mt-3">
    
    <?php require "header.php" ?>
    <nav class="animetions">
    <div class="wrapper animation">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>

        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21;">Login</h2>
            <form action="#">
                <div class="input-box animation " 
                style="--i:1; --j:22;">
                    <input type="text" id="user" required>
                    <label>Username</label>
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="input-box animation"
                 style="--i:2; --j:23;">
                    <input type="password" id="password" required>
                    <label >Password</label>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </div>
                <button type="submit" id="login" class="btn animation" 
                style="--i:3; --j:24;">Login</button>
                <div class="logreg-link animation" 
                style="--i:4; --j:25;">
                    <p>Don't have a account? <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
             <!-- <?php if (isset($login_error)) { echo "<p style='color:red;'>$login_error</p>"; } ?>
        <?php if (isset($user_error)) { echo $user_error; } ?>
        <?php if (isset($pass_error)) { echo $pass_error; } ?> -->

        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2>
            <p class="animation" style="--i:1; --j:21;">"Satu langkah lebih dekat menuju pengalaman yang luar biasa."</p>
        </div>


        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
            <form action="#" method="POST">
    <div class="input-box animation" style="--i:18; --j:1;">
        <input type="text" name="nama" required>
        <label>Username</label>
        <ion-icon name="person-outline"></ion-icon>
    </div>
    <div class="input-box animation" style="--i:19; --j:2;">
        <input type="email" name="email" required>
        <label>Email</label>
        <ion-icon name="mail-outline"></ion-icon>
    </div>
    <div class="input-box animation" style="--i:20; --j:3;">
        <input type="password" name="password" required>
        <label>Password</label>
        <ion-icon name="lock-closed-outline"></ion-icon>
    </div>
    <button type="submit" name="submit" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
    <div class="logreg-link animation" style="--i:22; --j:5;">
        <p>Already have an account? <a href="#" class="login-link">Login</a></p>
    </div>
</form>

        </div>
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Welcome Back!</h2>
            <p class="animation" style="--i:18; --j:1;">"Bergabunglah dengan kami untuk pengalaman tak terlupakan."</p>
        </div>
    </div>

    </nav>

    <script>
    // Tangani form login
    document.getElementById("login-form").addEventListener("submit", function(event) {
        event.preventDefault(); // Hindari pengiriman form default
        var formData = new FormData(this);

        fetch("login.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status_code === 200) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: data.title,
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "../index.php";
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: data.title,
                    text: data.message
                });
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
</script>

<script>

document.getElementById("login").onclick = function() {
    var user = document.getElementById("user").value;
    var password = document.getElementById("password").value;

    if (user === "user" && password === "user123") {
        Swal.fire(
            'Good job!',
            'Welcome Admin',
            'success'
        ).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php";
            }
        });
    } else {
        Swal.fire(
            'Maaf anda bukan admin!',
            'Hanya admin yang bisa berada disini..',
            'warning'
        ).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.html";
            }
        });
    }
}


</script>

    <?php require "footer.php"?>
<script src="loginser.js"></script>
    <!-- <script src="login.js"></script> -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
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