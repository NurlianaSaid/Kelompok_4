<?php 
error_reporting(0);
session_start();
require "../koneksi.php";


$admin = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_admin where id_admin='$sesiadmin'"));

?>

<?php require "header1.php"  ?>
        <div class="konten"> <!-- body web -->
            <div class="konten-kiri"> <!-- side bar left -->
         <h1>BERITA </h1>
        <a href="inputberita.php" title="Tambah berita" class="btn btn-outline-primary ml-4 mb-2"><i class="fas fa-plus"></i>Tambah Berita</a>
         <!-- menampilkan berita -->
         <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tgl posting</th>
                    <th>Gambar</th>
                    <th>Action</th>
            </thead>
            <tbody>
                <?php 
                $sql = mysqli_query($koneksi,"select * from tb_berita, tb_kategori, tb_admin where tb_berita.id_kategori=tb_kategori.id_kategori and tb_berita.id_admin=tb_admin.id_admin");
                while($row=mysqli_fetch_assoc($sql))
                {
  
                ?>
                <tr>
               
                    <td><?= $row['judul'];?></td>
                    <td><?= $row['kategori'];?></td>
                    <td><?= $row['text_berita'];?></td>
                    <td><?= $row['tgl_posting'];?></td>
                    <td><img src="../../gambar/<?= $row["gambar"];?>" width="50"></td>
                   
                         
                    <td><a href="editberita.php?id=<?= $row['id_berita'];?>" title="edit"  class="btn btn-success btn-sm">Edit</a>
                        <a href="hapusberita.php?id=<?= $row['id_berita'];?>" title="hapus" id="delete" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                </tr>
                <?php } ?>
            </tbody>
         </table>
            </div>
            
            <div class="konten-kanan"></div> <!-- side bar right -->
        </div>

        </div>
          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->
      </div>
    </div>
    <?php require "../footer.php" ?>
  </div>


<?php if (isset($_GET['m'])) : ?>
  <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
  <?php endif; ?>

<script>
  $('#delete').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.value) {
    document.location.href = href;
  }
});
  }) 

  const flashdata = $('.flash-data').data('flashdata')
  if (flashdata){
    Swal.fire({
      type: 'success',
      title: 'Success',
      text : 'Record has been deleted ',
    })
  }
</script>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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

