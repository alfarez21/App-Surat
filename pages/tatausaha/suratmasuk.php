<?php
  $query = "SELECT * FROM suratmasuk JOIN sifat USING(idSifat) WHERE idDisposisi=1 AND idUser={$user[0]['idUser']}";
  $daftar = dbmanager::getDataQ($query);
  $cekData = dbmanager::checkRowsQ($query);
  foreach ($daftar as $dt) {
    $status = ($dt['idStts']==1)?"Diterima":"Pendding";
    if($dt['idBacaP']==2){
      $i = "style='background:#d6d6d6'";
      $a = "<span style='color:red'>*</span>";
    }
    $data .= "
      <tr $i>
        <th scope='row'>{$dt['noRegister']}$a</th>
        <td>{$dt['tglMasuk']}</td>
        <td>{$dt['asal']}</td>
        <td>{$dt['perihal']}</td>
        <td>{$dt['sifat']}</td>
        <td>$status</td>
        <td>
          <a href='?page=form&form=lihatsurat&id={$dt['noRegister']}' class='btn btn-secondary btn-sm'>Lihat</a>
        </td>
      </tr>
    ";
  }
  if($cekData == 0){
    $data = "
      <tr>
        <td colspan='7'>Data Tidak Ada</td>
      </tr>
    ";
  }
  $content = template::breadcrumb("Beranda:index.php,Surat Masuk:?page=suratmasuk")."                   
  <!-- Daftar Surat Masuk / Table-->
  <div class='card'>
    <div class='card-header'>
      <h4 class='d-flex py-1'><span class='my-auto'>DAFTAR SURAT MASUK</span></h4> 
    </div>
    <div class='card-body'>
      <div class='table-responsive'>
        <table class='table table-striped table-hover table-bordered text-center'>
          <thead>
            <tr>
              <th style='width:150px'>No Register</th>
              <th>Tanggal</th>
              <th>Asal</th>
              <th>Perihal</th>
              <th>Sifat Surat</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            $data
          </tbody>
        </table>
      </div>
       
    </div>
  </div>
  ";
?>