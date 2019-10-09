<?php
  $newSurat = dbmanager::getDataQ("SELECT * FROM suratmasuk WHERE idDisposisi=1 AND idUser={$user[0]['idUser']} AND idBacaP=2");
  $username = "{$user[0]['fullname']}";
  $jabatan = "PEGAWAI";
  $title = "APPS SURAT | TATAUSAHA";
  $n = (count($newSurat)!=0)?"<span class='badge badge-danger'>".count($newSurat)."</span>":"";  
  $menu = "
    <li><a href='index.php'> <i class='icon-home'></i>Beranda</a></li>
    <li><a href='?page=suratmasuk'> <i class='icon-form'></i>Surat Masuk $n</a></li>
  ";
?>