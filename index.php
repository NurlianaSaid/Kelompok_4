
<?php 
// $conn = mysqli_connect("localhost","root","","berita_kita");
require "../koneksi.php";
// var_dump($koneksi);

?>

    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <title>PORTAL BERITA</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    @keyframes marqueeAnimation {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .carousel img {
        width:19px;
    }

    .headline {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .news-card {
        margin-bottom: 20px;
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
    #pageUpButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: none;
        
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
        /* overflow: hidden; */
        white-space: nowrap;
        background:rgb(59,15,23);
        border-color: #ec1c23;
        color: white;
        padding: 10px;
        border-radius: 50px;
        height:55px;
        margin-top:85px;
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
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .container.text-center {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 8px;
    }

    .col {
        padding: 10px;
    }

    .text-dark {
        color: #343a40 !important;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s;
    }

    .text-dark:hover {
        color: red !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding:10px;
    }

    .navbar-brand {
        font-size: 2rem;
        font-weight: bold;
        color: #ff5c00;
        text-decoration: none;
    }

    .navbar-brand:hover{
        color:white;
    }

    .navbar-brand span {
        color: #0066cc;
    }

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

    .form-control {
        background-color: #ffffff;
        border: 1px solid #ced4da;
        border-radius: 4px;
        width: 300px;
        width:50%;
        border-radius:50px;
        float:right;
    }

    .btn-outline-light {
        margin-left:10px;
        color: #fff;
        background-color: transparent;
        border-color: #fff;
        border-radius: 20px;
        padding: 5px 15px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-light:hover {
        color: #ec1c23;
        background-color: #fff;
    }

    .navbar-nav .nav-link {
        color: #fff;
        font-weight: 500;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
        color: black;
    }

    .dropdown-menu {
        background-color: rgb(220, 53, 69);
    }

    .dropdown-item {
        color: #fff;
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
        background-color:  #fff;
    }

    .dropdown-divider {
        border-top-color: #fff;
    }

    .navbar-toggler-icon {
        color: #fff;
    }
    .carousel.slide{
        margin-top:50px;
    }




    @media screen and (max-width:1000px) {
        .form-control {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 300px;
            width:100%;
            border-radius:50px;
            float:right;
        }
    }






</style>
<body class="px-0">
<nav class="navbar navbar-expand-lg bg-danger fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand">LISFATIL<span>NEWS<span></a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link " aria-current="page" href="index.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#berita">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="con1.php">Kontak Kami</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="loginser.php">Anggota</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="login.php">Admin</a></li>
          </ul>
        </li>
      </ul>
      <!-- <form  id="searchForm"  class="d-flex mt-3" role="search">
      <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn-outline-light" type="submit">Search</button>
       </form> -->
   <form id="searchForm" class="d-flex mt-2" role="search">
    <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button id="searchButton" class="btn-outline-light" type="button">Search</button>
</form>

    </div>
  </div>
</nav>
<div class="container marquee-container ">
            <div class="marquee-content">
                <p>
                    <span style="font-size:16px;">👋👋Selamat Datang di Portal Berita Kita!
                    </span>
                    &nbsp;&nbsp;&nbsp;
                    Nikmati berita terkini dan terpercaya dari kalangan mahasiswa.
                </p>
            </div>
        </div>


<div class="spasi" ></div>
<button id="pageUpButton" onclick="scrollToTop()"><i class="bi bi-chevron-double-up" aria-hidden="true"></i></button>

<div class="tempat_foto" id="home">
<div class="foto">
<div id="carouselExampleControlsNoTouching" class="carousel slide">
    <div class="carousel-inner">
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM tb_berita ORDER BY id_berita DESC LIMIT 5");
        $count = 0;
        while ($row = mysqli_fetch_array($data)) {
            $activeClass = ($count == 0) ? 'active' : ''; // Tambahkan kelas active untuk item pertama
        ?>
        <div class="carousel-item <?= $activeClass; ?>">
            <img src="../gambar/<?= $row['gambar']; ?>" class="d-block w-100" alt="Slide <?= $count + 1; ?>">
            <div class="bening"></div>
            <div class="carousel-caption d-none d-md-block mt-2">
                <h4><?= $row['judul']; ?></h4>
                <p><?= substr($row['text_berita'], 0, 100); ?>...</p>
            </div>
        </div>
        <?php
            $count++;
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
    </div>

<div class="foto" >
    <img src="gambar/palestina.jpeg" alt="" width="100%">
    <div class="bening"></div>
    <div class="deskripsi">
        <p style="background:black;">Ini<span></span> adalah <span></span> genosida.</p>
        <p>Terima Peringatan Dari Israel, Ribuan Warga Palestina Tinggalkan Gaza</p>
    </div>
    </div>

<div class="foto">
    <img src="gambar/1.jpg" alt="">
    <div class="bening"></div>
        <div class="deskripsi">
        <p style="background:black;">Mengapa <span></span> Manusia  <span></span> Membutuhkan Berita?</p>
        <h2>  Berita menimbulkan rasa aman, kontrol diri, dan paham situasi</h2>
        </div>  
       </div>

<div class="foto">
    <img src="gambar/curi.png" alt="" width="100%">
    <div class="bening"></div>
        <div class="deskripsi">
        <p style="background:black;">Jangan <span></span> jadi <span></span> pencuri</p>
        <h2>“Barangsiapa yang mengambil harta manusia, dengan niat ingin menghancurkannya, maka Allah juga akan menghancurkan dirinya.”</h2>
        </div>  
      </div>
 </div> 
        


    <div class="container text-center">
  <div class="row" id="berita">
    <div class="col-md-8">
    <div class="row mt-3">
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM tb_berita, tb_admin WHERE tb_berita.id_admin=tb_admin.id_admin ORDER BY id_berita DESC LIMIT 6");
        while ($row = mysqli_fetch_array($data)) {
        ?>
        <div class="col-lg-6 mb-4">
            <div class="card" style="overflow:hidden;">
                <img src="../gambar/<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['judul']; ?>" style="width:100%;height:100%;">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['judul']; ?></h5>
                    <p class="card-text"><?= substr($row['text_berita'], 0, 100); ?>...</p>
                    <a href="detail_berita.php?id=<?= $row['id_berita']; ?>" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    <div class="col-md-4 mt-3">
    <?php
            $data = mysqli_query($koneksi, "select * from tb_iklan join tb_admin on tb_iklan.id_admin = tb_admin.id_admin where tb_iklan.status='aktif' order by id_iklan desc");
            while($row = mysqli_fetch_array($data)){
            
            ?>
         <img src="../gambar/<?= $row['gambar'];?>" alt="<?= $row['nm_perusahaan'];?>" style="width:100%;height:150px;">
                <a href=""><h3><?= $row['link'];?><?= $row['nm_perusahaan'];?></h3></a>
                <hr>
                <p><?= $row['isi_iklan'];?></p> 
            <br>
            <?php } ?>
    </div>
  </div>
</div>

    <!-- Bagian Berita Terbaru -->
  
</div>


<button id="pageUpButton" onclick="scrollToTop()">⌂</button>
<script src="java.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchButton').addEventListener('click', function() {
        var keyword = document.getElementById('searchInput').value;
        searchNews(keyword);
    });
});

function searchNews(keyword) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search.php?q=' + keyword, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Sukses menerima respons
            var response = xhr.responseText;
            document.getElementById('berita').innerHTML = response;
        } else {
            // Terjadi kesalahan
            console.error('Error: ' + xhr.statusText);
        }
    };

    xhr.onerror = function() {
        // Terjadi kesalahan koneksi
        console.error('Koneksi error');
    };

    xhr.send();
}
</script>

<!-- Script JavaScript -->
<script src="java.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inisialisasi slider
        var slider = new bootstrap.Carousel(document.querySelector('.carousel'), {
            interval: 300 // Atur interval perpindahan slide (dalam milidetik)
        });
    });
</script>

<script >
    function searchNews(keyword) {
    // Sembunyikan elemen slide saat pencarian dimulai
    document.getElementById('carouselExampleControlsNoTouching').style.display = 'none';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search.php?q=' + keyword, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Sukses menerima respons
            var response = xhr.responseText;
            // Perbarui markup HTML hanya untuk daftar berita
            document.getElementById('berita').innerHTML = response; // Ganti 'response' dengan bagian dari respons yang berisi daftar berita

            // Tampilkan kembali elemen slide setelah pencarian selesai
            document.getElementById('carouselExampleControlsNoTouching').style.display = 'block';
        } else {
            // Terjadi kesalahan
            console.error('Error: ' + xhr.statusText);
        }
    };

    xhr.onerror = function() {
        // Terjadi kesalahan koneksi
        console.error('Koneksi error');
    };

    xhr.send();
}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-iUcXo2BUYKcVxF7sJt3GYwkgqEIlU6zB/BuUZZe+SjBwnjZKl4+gq4dh0e8l4fpk" crossorigin="anonymous"></script>
<?php require "footer.php" ?>
