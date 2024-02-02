<?php
require "../koneksi.php";
    // Ambil data berita berdasarkan ID dari URL
    $id_berita = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_berita, tb_admin WHERE id_berita = $id_berita");
    $berita = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita - <?= $berita['judul']; ?></title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        /* style.css */


.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

img {
    display: block;
    margin: 0 auto 20px;
    max-width: 100%;
    height: auto;
}



a:hover {
    text-decoration: underline;
}


/* Header and Footer styles */
header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

footer p {
    margin: 0;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

.card {
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 20px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card img {
    width: 100%;
    height: auto;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 20px;
    margin-bottom: 10px;
}

.card-text {
    color: #666;
}

.card a.btn {
    display: block;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <?php require "header.php" ?>
    <div class="container">
        <h1><?= $berita['judul']; ?></h1>
        <?php if (!empty($berita['gambar'])): ?>
            <img src="../gambar/<?= $berita['gambar']; ?>" alt="<?= $berita['judul']; ?>" style="max-width: 100%;">
        <?php endif; ?>
        <p><?= $berita['text_berita']; ?></p>
        <p>Tanggal Publikasi: <?= $berita['tgl_posting']; ?></p>
        <p>Oleh: <?= $berita['nama_lengkap']; ?></p>
        <!-- Tambahkan tombol atau tautan kembali di sini -->
        <a href="javascript:history.back()">Kembali</a>
        <!-- Tambahkan bagian komentar atau diskusi di sini jika diperlukan -->
    </div>
    <?php require "footer.php" ?>
</body>
</html>
