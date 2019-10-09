<?php
  $daftar = $sMasuk->getData();
  $cekData = $sMasuk->checkRows();
  foreach ($daftar as $dt) {
    $status = ($dt['idDisposisi']==1)?"OK":"Pendding";
    $data .= "
      <tr>
        <th scope='row'>{$dt['noRegister']}</th>
        <td>{$dt['tglMasuk']}</td>
        <td>{$dt['asal']}</td>
        <td>{$dt['perihal']}</td>
        <td>$status</td>
        <td>
          <a href='?page=form&form=edit&id={$dt['noRegister']}' class='btn btn-primary btn-sm'>Edit</a>
          <a href='?page=form&form=lihat&id={$dt['noRegister']}' class='btn btn-secondary btn-sm'>Lihat</a>
          <a href='logic/hapus.php?id={$dt['idSMasuk']}' class='btn btn-danger btn-sm'>Hapus</a>
        </td>
      </tr>
    ";
  }
  if($cekData == 0){
    $data = "
      <tr>
        <td colspan='6'>Data Tidak Ada</td>
      </tr>
    ";
  }
  $content = template::breadcrumb("Beranda:index.php,Register Surat Masuk:?page=daftarsurat")."                   
  <!-- Daftar Surat Masuk / Table-->
  <div class='card'>
    <div class='card-header'>
      <h4 class='d-flex'><span class='my-auto'>DAFTAR SURAT MASUK</span> <a href='?page=form&form=tambah' class='btn btn-success ml-auto'>Tambah</a></h4> 
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