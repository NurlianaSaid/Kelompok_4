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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">

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
        border-color: #ec1c23;
        color: white;
        padding: 10px;
        border-radius: 50px;
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
<nav class="navbar navbar-expand-lg bg-danger">
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
      <form  id="searchForm"  class="d-flex mt-3" role="search">
      <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn-outline-light" type="submit">Search</button>
       </form>
    </div>
  </div>
</nav>
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


        
