<?php
  if($disposisi=="belum"){
    $daftar = $sMasuk->getDataa("=",["idDisposisi"=>2]);
    foreach ($daftar as $dt) {
      if($dt['idBacaP']==2){
        $i = "style='background:#d6d6d6'";
        $a = "<span style='color:red'>*</span>";
      }
      $surat .= "
        <tr $i>
          <th scope='row'>{$dt['noRegister']}$a</th>
          <td>{$dt['tglMasuk']}</td>
          <td>{$dt['asal']}</td>
          <td>{$dt['perihal']}</td>
          <td>
            <a href='?page=form&form=tambah&id={$dt['noRegister']}' class='btn btn-success btn-sm'>disposisi</a>
          </td>
        </tr>
      ";
    }
    if(count($daftar)==0){
      $surat .= "
        <tr>
          <td colspan='5'>Data Tidak Ada</td>
        </tr>
      ";
    }
    $content = template::breadcrumb("Beranda:index.php,Surat Belum Disposisi")."
    <!-- Daftar Surat Masuk / Table-->
    <div class='card'>
      <div class='card-header'>
        <h4>SURAT MASUK BELUM DISPOSISI</h4>
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
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              $surat
            </tbody>
          </table>
        </div>
      </div>
    </div>
    ";
    }
    if($disposisi=="sudah"){
      $daftar = dbmanager::getDataQ("SELECT * FROM suratmasuk JOIN sifat USING(idSifat) JOIN users USING(idUser) WHERE idDisposisi=1");
      foreach ($daftar as $dt) {
        $status = ($dt['idStts']==1)?"OK":"Pendding";
        $surat .= "
          <tr>
            <th scope='row'>{$dt['noRegister']}</th>
            <td>{$dt['tglMasuk']}</td>
            <td>{$dt['asal']}</td>
            <td>{$dt['perihal']}</td>
            <td>{$dt['fullname']}</td>
            <td>{$dt['sifat']}</td>
            <td>$status</td>
            <td>
              <a href='?page=form&form=lihat&id={$dt['noRegister']}' class='btn btn-secondary btn-sm'>Lihat</a>
              <a href='logic/disposisi.php?disposisi=batal&id={$dt['noRegister']}' class='btn btn-danger btn-sm'>Batal</a>            
            </td>
          </tr>
        ";
      }
      if(count($daftar)==0){
        $surat .= "
          <tr>
            <td colspan='8'>Data Tidak Ada</td>
          </tr>
        ";
      }
      $content = template::breadcrumb("Beranda:index.php,Surat Sudah Disposisi")."
      <!-- Daftar Surat Masuk / Table-->
      <div class='card'>
        <div class='card-header'>
          <h4>SURAT MASUK SUDAH DISPOSISI</h4>
        </div>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered text-center'>
              <thead>
                <tr>
                  <th style='width:150px'>No Surat</th>
                  <th>Tanggal</th>
                  <th>Asal</th>
                  <th>Perihal</th>
                  <th>Pegawai</th>
                  <th>Sifat Surat</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                $surat
              </tbody>
            </table>
          </div>
        </div>
      </div>
      ";
    }
?>