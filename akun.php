<?php
include("proses/connect.php");
$query = mysqli_query($db,"SELECT * FROM tb_akun");
while($record = mysqli_fetch_array($query)) {
  $result[]=$record;
}
?>
<div class="col-lg-9 mt-3">
 <div class="card">
  <div class="card-header">
    Halaman Akun
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col d-flex justify-content-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah Akun</button>
      </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-xl modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate action="proses/input_akun.php" method="post">
      <div class="row">
        <div class="col-lg-6">
      <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Nama kamu" name="nama" required>
  <label for="floatingInput">Nama</label>
  <div class="invalid-feedback">
      Masukkan nama!
    </div>
</div>
</div>
<div class="col-lg-6">
<div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
  <label for="floatingInput">Email</label>
  <div class="invalid-feedback">
      Masukkan Email yang valid!
    </div>
</div>
</div>
</div>
      <div class="row">
        <div class="col-lg-8">
      <div class="form-floating mb-3">
  <input type="NUMBER" class="form-control" id="floatingInput" placeholder="08xxx" name="nohp" required>
  <label for="floatingInput">No HP</label>
  <div class="invalid-feedback">
      Masukkan No HP yang benar!
    </div>
</div>
</div>
<div class="col-lg-4">
<div class="form-floating mb-3">
<select class="form-select" aria-label="Default select example" name="level" required>
  <option selected hidden value="0">Pilih level hak akses</option>
  <option value="1">Owner</option>
  <option value="2">Kasir</option>
  <option value="3">Pelanggan</option>
</select>
<label for="floatingInput">Level Pengguna</label>
<div class="invalid-feedback">
      Pilih level akses!
    </div>
</div>
</div>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" disabled value="1234" name="password">
  <label for="floatingPassword">Password</label>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="validate_input" value="1234">Save changes</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>
<!-- End Modal -->
 <!-- View Modal -->
 <div class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-xl modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End View Modal -->
 <?php
 if(empty($result)){
  echo "Data akun tidak ada";
 }else {
  
 
 ?>
  <div class="table-responsive">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">No HP</th>
      <th scope="col">Level</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no=1;
  foreach($result as $row){
    ?>
    <tr>
      <th scope="row"><?php echo $no++ ?></th>
      <td><?php echo $row['nama']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['nohp']?></td>
      <td><?php echo $row['level']?></td>
      <td class="d-flex">
        <button class="btn btn-info btn-sm me-1"data-bs-toggle="modal" data-bs-target="#ModalView"><i class="bi bi-eye"></i></button>
        <button class="btn btn-warning btn-sm me-1"><i class="bi bi-pencil"></i></button>
        <button class="btn btn-danger btn-sm "><i class="bi bi-trash3"></i></button>
      </td>
    </tr>
    <?php
  }
      ?>
  </tbody>
</table>
</div>
<?php }?>
  </div>
</div>
</div>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

