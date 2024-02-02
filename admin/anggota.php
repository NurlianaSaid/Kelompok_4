<?php 
error_reporting(0);
session_start();
require "../koneksi.php";
$sesiadmin = $_SESSION['webportal']; //sesi login

if (!isset($sesiadmin)) {
    header('location:index.php'); //redirect atau location
}
$admin = mysqli_fetch_array(mysqli_query($koneksi, "select * from tb_admin where id_admin='$sesiadmin'"));
?>

<?php  require "header1.php" ?>
<div class="konten">
    <div class="konten-kiri">
        <h1>DAFTAR ANGGOTA</h1>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?php
                        if ( $row["status"] == 'aktif') {
                          echo "<span class='badge badge-success'>Aktif</span>";
                        }else if($row["status"] == 'tidak aktif'){
                          echo "<span class='badge badge-warning'>Tidak aktif</span>";
                        };?></td>
                        <?php 
                        if ($row['status'] == 'aktif') {
                        ?>
                            <td>
                                <a href="blokiranggota.php?id=<?= $row['id_anggota']; ?>" title="edit" onclick=" return confirm('Yakin Data Ingin Diblokir ?')"; class="btn btn-danger btn-sm">Blokir</a>
                                <a href="javascript:void(0);" onclick="hapusAnggota(<?= $row['id_anggota']; ?>)" title="hapus"  onclick=" return confirm('Yakin Data Ingin Dihapus ?')"; class="btn btn-primary btn-sm">Hapus</a>
                            </td>
                        <?php 
                        } else {
                        ?>
                            <td>
                                <a href="bukablokiranggota.php?id=<?= $row['id_anggota']; ?>" title="edit">Buka Blokir</a>
                                <a href="hapusanggota.php?id=<?= $row['id_anggota']; ?>" title="hapus">Hapus</a>
                            </td>
                        <?php 
                        }
                        ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="konten-kanan"></div>
</div>

<script>
    function hapusAnggota(idAnggota) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus anggota ini?");

        if (konfirmasi) {
            // Jika pengguna mengonfirmasi, lakukan penghapusan dengan mengarahkan ke file atau fungsi penghapusan
            window.location.href = "hapusanggota.php?id=" + idAnggota;
        } else {
            // Jika pengguna membatalkan, tidak lakukan apa-apa
            console.log("Penghapusan dibatalkan");
        }
    }
</script>
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
                <div class="modal-body" style="font-size: 30px; background-color: white;">
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
      <?php require "../footer.php" ?>
    </div>

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

