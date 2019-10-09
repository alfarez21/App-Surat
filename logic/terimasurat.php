<?php
include_once("../classes/classes.php");
include_once("conf.php");

if(isset($simpan)){
  $update = $sMasuk->update(
  [
    "idDisposisi"=>1,
    "idStts"=>1,
  ],
  ["idSMasuk"=>"$idP"]
  );
  common::redirect("../?page=suratmasuk");
}

?>