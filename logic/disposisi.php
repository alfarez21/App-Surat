<?php
include_once("../classes/classes.php");
include_once("conf.php");

if(isset($simpan)){
  $update = $sMasuk->update(
  [
    "idDisposisi"=>1,
    "idSifat"=>$sifatSurat,
    "idUser"=>$ditunjuk,
    "idBacaP"=>2
  ],
  ["idSMasuk"=>"$idP"]
  );
  if($update > 0){
    common::redirect("../?page=daftarsurat&disposisi=sudah");
  }
  else{
    common::redirect("../?page=form&form=tambah&id=xx/22-b4/2019&stts=kesalahansistem");
  }
}

if($disposisi=="batal"){
  $sMasuk->update(
  [
    "idDisposisi"=>2,
    "idStts"=>2
  ],
  ["noRegister"=>$id]
  );
  common::redirect("../?page=daftarsurat&disposisi=sudah&notif=dibatalkan");
}

?>