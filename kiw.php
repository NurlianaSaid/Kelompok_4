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
    margin-top:20px;
    justify-content:center;
    align-items:center;
    margin-left:20%;
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
    
</style>
<body class="px-0">

<nav class="navbar border-bottom border-body" data-bs-theme="dark" style="height: 80px;  background-color: #ec1c23;">
        <div class="container-fluid">
            <a class="navbar-brand">LISFATIL<span>NEWS</span></a>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </nav>


    <div class="container text-center mt-3">
        <div class="row">
            <div class="col"><a href="index.php" class="text-dark text-decoration-none" title="Beranda">Beranda</a></div>
            <div class="col"><a href="anggota.php" class="text-dark text-decoration-none" title="Berita">Berita</a></div>
            <div class="col"><a href="con1.php" class="text-dark text-decoration-none" title="Kontak Kami">Kontak kami</a></div>
            <div class="col"><a href="loginser.php" class="text-dark text-decoration-none" title="Login Anggota">Login Anggota</a></div>
            <div class="col"><a href="login.php" class="text-dark text-decoration-none" title="Login Admin">Login Admin</a></div>
        </div>

        <div class="container marquee-container mt-4">
            <div class="marquee-content">
                <p>
                    <span style="font-size:20px; font-weight:bold;">👋👋Selamat Datang di Portal Berita Kita!
                    </span>
                    &nbsp;&nbsp;&nbsp;
                    Nikmati berita terkini dan terpercaya dari kalangan mahasiswa.
                </p>
            </div>
        </div>
