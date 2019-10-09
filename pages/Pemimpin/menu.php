<?php
  $daftar = $sMasuk->getDataa("=",["idBacaL"=>"2"]);
  $username = "{$user[0]['fullname']}";
  $jabatan = "PEMIMPIN";
  $n = (count($daftar)!=0)?"<span class='badge badge-danger'>".count($daftar)."</span>":"";
  $menu = "
    <li><a href='index.php'> <i class='icon-home'></i>Beranda</a></li>
    <li><a href='?page=daftarsurat&disposisi=belum'> <i class='icon-form'></i>Belum Disposisi $n</a></li>
    <li><a href='?page=daftarsurat&disposisi=sudah'> <i class='icon-form'></i>Sudah Disposisi</a></li>
  ";
?>