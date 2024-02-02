<?php
require "../koneksi.php";

if(isset($_GET['q'])) {
    $keyword = mysqli_real_escape_string($koneksi, $_GET['q']);
    $query = "SELECT * FROM tb_berita WHERE judul LIKE '%$keyword%' OR text_berita LIKE '%$keyword%'";
    $result = mysqli_query($koneksi, $query);
}

if(isset($result) && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>
<div class="col-lg-6 mb-4">
    <div class="card" style="overflow:hidden;">
        <img src="../gambar/<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['judul']; ?>" style="width:100%;height:100%;">
        <div class="card-body">
            <h5 class="card-title"><?= $row['judul']; ?></h5>
            <p class="card-text"><?= substr($row['text_berita'], 0, 100); ?>...</p>
            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
        </div>
    </div>
</div>
<?php 
    }
} else {
    echo "<p>Tidak ada hasil pencarian.</p>";
}
?>
