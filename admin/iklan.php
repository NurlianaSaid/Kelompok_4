<?php 
error_reporting(0);
session_start();
require "../koneksi.php";
require "../fungsi/fungsi.php";
$sesiadmin = $_SESSION['owder']; //sesi login

if(!isset($sesiadmin)){
    header('location:index1.php'); //redirect atau location
}
$admin = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_admin where id_admin='$sesiadmin'"));

?>

<?php require "header1.php" ?>
        <div class="konten"> <!-- body web -->
            <div class="konten-kiri"> <!-- side bar left -->
         <h1>IKLAN </h1>
        <a href="inputiklan.php" title="Tambah Iklan"class="btn btn-outline-primary ml-4 mb-2"><i class="fas fa-plus"></i> Tambah </a>
         <!-- menampilkan berita -->
         <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Nama Perusahaan </th>
                    <th>Tanggal Iklan</th>
                    <th>Deskripsi</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Gambar</th>
                    <th>Action</th>
            </thead>
            <tbody>
                <?php 
                $sql = mysqli_query($koneksi,"select * from tb_iklan, tb_admin where tb_iklan.id_admin=tb_admin.id_admin");
                while($row=mysqli_fetch_assoc($sql))
                {
  
                ?>
                <tr>
               
                    <td><?= $row['nm_perusahaan'];?></td>
                     <td><?= format_tgl1($row['tgl_mulai']);?> - <?= format_tgl1($row['tgl_selesai']);?></td>
                    <td><?= $row['isi_iklan'];?></td>
                    <td><?= $row['link'];?></td>
                    <td><?php
                        if ( $row["status"] == 'aktif') {
                          echo "<span class='badge badge-success'>Aktif</span>";
                        }else if($row["status"] == 'Tidak aktif'){
                          echo "<span class='badge badge-warning'>Tidak aktif</span>";
                        }?></td>
                        
                    <td><img src="../../gambar/<?= $row["gambar"];?>" style="width:100px;height:100px;"></td>
                <td>
                           <a href="editiklan.php?id=<?= $row["id_iklan"]?>" class="btn btn-success btn-sm">
                    <i class="fas fa-edit"></i>
                  </a> 
                          <a href="hapusiklan.php?id=<?= $row["id_iklan"];?>" onclick=" return confirm('Yakin Data Ingin Dihapus ?')"; class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                  </a></td>
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
                <div class="modal-body ">
                  <p color="white">Are you sure you want to logout?</p>
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

