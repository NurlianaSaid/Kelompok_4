
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <title>PORTAL BERITA</title>
  <link rel="stylesheet" href="con1.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" Shref="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   

  
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
        background-color: #ffffff; /* Warna putih untuk latar belakang */
        border: 1px solid #ced4da; /* Warna border */
        border-radius: 4px; /* Border radius untuk sudut elemen */
        width: 300px; /* Panjang input search, sesuaikan dengan kebutuhan Anda */
        width:700px;
        border-radius:50px;
        position:relative;
    }

    /* Gaya untuk tombol search */
    .btn-outline-success {
        background-color: #fff
        fff; /* Warna putih untuk latar belakang */
        border: 1px solid #28a745; /* Warna border */
        border-radius: 4px; /* Border radius untuk sudut elemen */
        color: white; /* Warna teks */
        margin-right:200px;
        margin-left:10px;
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
    .btn-outline-light {
    margin-left:10px;
    color: #fff; /* Warna teks */
    background-color: transparent; /* Warna latar belakang transparan */
    border-color: #fff; /* Warna border */
    border-radius: 20px; /* Bentuk sudut tombol */
    padding: 5px 15px; /* Padding di dalam tombol */
    transition: background-color 0.3s, color 0.3s; /* Efek transisi untuk perubahan warna */
}

/* Hover state untuk tombol pencarian */
.btn-outline-light:hover {
    color: #ec1c23; /* Warna teks saat dihover */
    background-color: #fff; /* Warna latar belakang saat dihover */
}
    
</style>
<body class="px-0">

<?php require "header.php" ?>
<div class="kontak">
    <div class="title">
        <h2>Get in Touch</h2>
    </div>
    <div class="box">
        <!-- form -->
        <div class="contact from">
            <h3>Send a Message</h3>
            <form action="">
                <div class="formBox">
                    <div class="row50">
                        <div class="inputBox">
                            <span>First Name</span>
                            <input type="text" placeholder="Nur">
                        </div>
                        <div class="inputBox">
                            <span>Last Name</span>
                            <input type="text" placeholder="Liana">
                        </div>
                    </div>

                    <div class="row50">
                        <div class="inputBox">
                            <span>Email</span>
                            <input type="text" placeholder="Nurliana@gmail.com">
                        </div>
                        
                        <div class="inputBox">
                            <span>Mobile</span>
                            <input type="text" placeholder="+62 082 190 289 2770">
                        </div>
                    </div>
                    <h4> 
                        <div class="row100">
                        <div class="inputBox">
                            <span>Message</span>
                           <textarea placeholder="Write you message here..."></textarea>
                        </div>
                    </div>
                </h4>
                    <div class="row100">
                    <div class="inputBox">
                    <input type="submit" value="Send">
                    </div>
                </div>
                   
                        
                  </div>
            </form>
        </div>

        <!-- info box -->
        <div class="contact info">
            <h3>Contact Info</h3>
            <div class="infoBox">
             <div class="div">
                    <span><ion-icon name="location"></ion-icon></span>
                    <p>lelupang desa lagi-agi <br>Sulawesi barat </p>
                </div>
                <div class="div">
                    <span><ion-icon name="mail"></ion-icon>
                      </span>
                    <a href="mailto:liananur480@gmail.com">Liananur480@gmail.com</a>
                </div>
                <div class="div">
                    <span><ion-icon name="call"></ion-icon></span>
                    <a href="tel:+6283137825133">+62 831 3782 5133</a>
                </div>
                <!-- sosial media link -->
                <ul class="sci">
                    <li><a href=""><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href=""><ion-icon name="logo-twitter"></ion-icon></li></a>
                    <li><a href=""><ion-icon name="logo-linkedin"></ion-icon></li></a>
                    <li><a href=""><ion-icon name="logo-instagram"></ion-icon></li></a>
                </ul>
            </div>
        </div>
      
        <!-- map -->
        <div class="contact map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.5710932969882!2d119.12796549999997!3d-3.453923899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d94970fcd4e640f%3A0xa1207edea2d821a7!2sLelupang%20desa%20lagi%20agi!5e0!3m2!1sid!2sid!4v1703053498642!5m2!1sid!2sid"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>


<div id="team" class="section-header text-center pb-2 mt-5" data-aos="fade-up" data-aos-delay="250">
          <h2><b>Our</b> <u class="garis">Team</u></h2>
          <p>Halo, selamat datang teman-teman tersayangku >,< 
          <br> Yuk intip motto hidup kami.. kalian apa?</p>
        </div>
 <div class="container-md mt-5 ">
    <div class="row row-cols-1 row-cols-md-5 g-4">
      <div class="col">
        <div class="card text-center">
          
          <div class="card-body">
            
            <img src="gambar/liana.jpg" alt="" class="img-fluid rounded-circle" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-black"><b>Nurliana</b></h3>
            <p>Motto hidup: Kegagalan datang dari terlalu banyak rencana, tapi sedikit pemikiran.</p>
          
            <br>
            <div class="card-footer">
            
           
          
            <p class="socials">
              <a href="index.html">
              <button  class="btn btn-success">Visit</button></a>
              <i class="bi bi-twitter text-dark mx-1"></i>
              <i class="bi bi-facebook text-dark mx-1"></i>
              <i class="bi bi-linkedin text-dark mx-1"></i>
              <i class="bi bi-instagram text-dark mx-1"></i>
            </p>
            </div>
          </div>
        </div>
      </div>
   
    <div class="col">
      <div class="card text-center">
        
        <div class="card-body">
          
          <img src="gambar/fauzi1.jpg" alt="" class="img-fluid rounded-circle" data-aos="fade-up" data-aos-delay="300">
          <h3 class="text-black"><b>Fauzi</b></h3>
          <p>Motto hidup: Jangan hanya menunggu, tetapi ciptakan waktu anda sendri.</p>
          <br>
          
          <div class="card-footer">
          <p class="socials">
            <a href="/ulangan harian/galdy.html">
            <button class="btn btn-success">Visit</button></a>
            <i class="bi bi-twitter text-dark mx-1"></i>
            <i class="bi bi-facebook text-dark mx-1"></i>
            <i class="bi bi-linkedin text-dark mx-1"></i>
            <i class="bi bi-instagram text-dark mx-1"></i>
          </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-center">
        
        <div class="card-body">
          
          <img src="gambar/adel.jpg" alt="" class="img-fluid rounded-circle" data-aos="fade-up" data-aos-delay="300">
          <h3 class="text-black"><b>Adelia</b></h3>
          <p>Motto hidup: Jangan hanya menunggu, tetapi ciptakan waktu anda sendri.</p>
          <br>
          
          <div class="card-footer">
          <p class="socials">
            <a href="/ulangan harian/galdy.html">
            <button class="btn btn-success">Visit</button></a>
            <i class="bi bi-twitter text-dark mx-1"></i>
            <i class="bi bi-facebook text-dark mx-1"></i>
            <i class="bi bi-linkedin text-dark mx-1"></i>
            <i class="bi bi-instagram text-dark mx-1"></i>
          </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-center">
        
        <div class="card-body">
          
          <img src="gambar/tenri.jpg" alt="" class="img-fluid rounded-circle" data-aos="fade-up" data-aos-delay="300">
          <h3 class="text-black"><b>Tenri</b></h3>
          <p>Motto hidup: Jangan terlalu serius, hidup ini bukan ujian matematika.Semangat:) </p>
          <br>
          
          <div class="card-footer">
          <p class="socials">
            <a href="/ulangan harian/galdy.html">
            <button class="btn btn-success">Visit</button></a>
            <i class="bi bi-twitter text-dark mx-1"></i>
            <i class="bi bi-facebook text-dark mx-1"></i>
            <i class="bi bi-linkedin text-dark mx-1"></i>
            <i class="bi bi-instagram text-dark mx-1"></i>
          </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-center">
        
        <div class="card-body">
          
          <img src="gambar/adel.jpg" alt="" class="img-fluid rounded-circle" data-aos="fade-up" data-aos-delay="300">
          <h3 class="text-black"><b>Sukmawati</b></h3>
          <p>Motto hidup: Hidup adalah petualangan, jangan lupa berpetualang.</p>
          <br>
          
          <div class="card-footer">
          <p class="socials">
            <a href="/ulangan harian/galdy.html">
            <button class="btn btn-success">Visit</button></a>
            <i class="bi bi-twitter text-dark mx-1"></i>
            <i class="bi bi-facebook text-dark mx-1"></i>
            <i class="bi bi-linkedin text-dark mx-1"></i>
            <i class="bi bi-instagram text-dark mx-1"></i>
          </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
 </section>
 <style>
  .garis{
    color:red;
  }
  h2 b ~ .garis:hover{
    color:black;
    opacity:70%;
  }
  #pageUpButton {
    position: fixed;
    right: 20px;
    bottom: 20px;
    padding: 10px;
    background: rgb(224, 226, 227);
    border:none;
    border-radius: 5px;
    display: none;
    color:black;
}
</style>

<?php require "footer.php" ?>
</div>  
</div>
<button id="pageUpButton" onclick="scrollToTop()"><ion-icon name="caret-up-circle-outline"></ion-icon></button>

<script src="con1.js"></script>

 </div>


</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
    </html>