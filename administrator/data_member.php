<?php
include "sidebar.php";
?>
    <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                </div>
                <div class="card mt-2">
<div class="card-body">
              <?php 
              if(isset($_GET['pesan'])){
                if($_GET['pesan']=="simpan"){
                echo '<script>
                  alert("Data Berhasil Di Simpan");
                </script> ';
                }
                }
              ?>
              <?php 
              if(isset($_GET['pesan'])){
                if($_GET['pesan']=="update"){
                echo '<script>
                  alert("Data Berhasil Di Edit");
                </script> ';
                }
              }
              ?>
  <table class="table">
    <table id="data-table" class="table table-bordered table-striped table-sm mt-3">
        <thead class="thead-primary">
        <tr class="table-dark" class="fw-bold" align="center">
      <th>No</th> 
      <th>NIK</th>
      <th>Nama Member</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>Nomor Telepon</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include '../koneksi.php';
    $no = 1;
    $data = mysqli_query($koneksi,"select * from member");
    while($d = mysqli_fetch_array($data)){
      ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $d['NIK']; ?></td>
      <td><?php echo $d['Nama']; ?></td>
      <td><?php echo $d['JenisKelamin']; ?></td>
      <td><?php echo $d['Alamat']; ?></td>
      <td><?php echo $d['NomorTelepon']; ?></td>
      <td>
      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['NIK']; ?>"><i class="fas fa-edit"></i>
      Edit
      </button>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['NIK']; ?>"><i class="fas fa-trash-alt"></i>
      Hapus
      </button>
      </td>
    </tr>

    <!-- Modal Edit Data -->
<div class="modal fade" id="edit-data<?php echo $d['NIK']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="proses_update_member.php" method="post">
      <div class="modal-body">
            <div class="form-group">
            <label>Nama Member</label>
            <input type="hidden" name="NIK" value="<?php echo $d['NIK']; ?>" autocomplete="off">
            <input type="text" name="Nama" class="form-control" value="<?php echo $d['Nama']; ?>" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <input type="text" name="JenisKelamin" class="form-control" value="<?php echo $d['JenisKelamin']; ?>" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="Alamat" class="form-control" value="<?php echo $d['Alamat']; ?>" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="NomorTelepon" class="form-control" value="<?php echo $d['NomorTelepon']; ?>" autocomplete="off">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
</form>
  </div>
</div>

    <!-- Modal Hapus Data -->
<div class="modal fade" id="hapus-data<?php echo $d['NIK']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="proses_hapus_member.php">
          <div class="modal-body">
            <input type="hidden" name="NIK" value="<?php echo $d['NIK']; ?>">
            Apakah anda yakin akan menghapus data <b><?php echo $d['Nama']; ?></b>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
  </tbody>
</table>
</div>
</div>
  </div>
</div>
</div>


</div>
