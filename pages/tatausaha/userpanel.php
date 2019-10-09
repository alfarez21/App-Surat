<?php
switch ($user[0]['idLevel']) {
  case '1':
    $level = "PEMIMPIN";
    break;
  
  case '2':
    $level = "TATAUSAHA";
    break;
  
  case '3':
    $level = "PEGAWAI";
    break;  
  
  default:
    $level = "Tidak  Diketahui";
    break;
}
echo $pprofile;
$content = "
<!-- Daftar Surat Masuk / Table-->
<div class='card'>
  <div class='card-header'>
    <h4>USER PANEL</h4>
  </div>
  <div class='card-body'>
    <form method='post' action='logic/userpanel.php' enctype='multipart/form-data'>
      <div class='row'>
        <input type='text' value='{$user[0]['idUser']}' name='idP' class='form-control' hidden>
        <div class='col-sm-6  col-md-4 mb-3 px-sm-5 px-2 text-center'>
          <img src='Pusers/{$user[0]['profile']}' style='border-radius:50%;width:100%'>
          <input type='file' name='file' class='my-3'>
          <button class='btn btn-sm btn-block btn-primary' type='submit' name='upload'>Upload</button>
          </div>
        <div class='col-sm-6 col-md-5 mb-3'>
          <h5 class='mb-3'>USER PROFILE</h5>
            <div class='form-group mb-3'>
            <label>Full Name :</label>
            <input type='text' placeholder='Full Name' value='{$user[0]['fullname']}' name='fullname' class='form-control'>
          </div>
          <div class='form-group mb-3'>       
            <label>Username :</label>
            <input type='text' value='{$user[0]['username']}' disabled class='form-control'>
          </div>
          <div class='form-group mb-3'>       
            <label>User Level :</label>
            <input type='text' value='$level' disabled class='form-control'>
          </div>
          <div class='form-group mb-3'>       
            <button type='submit' name='simpan' class='btn btn-primary'>Simpan</button>
            <button type='reset' class='btn btn-warning'>Reset</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
";