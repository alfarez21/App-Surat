<?php
include_once("../classes/classes.php");
include_once("conf.php");

$surat = $sMasuk->getDataa("=",["noRegister"=>$id]);
$pics = explode(",",$surat[0]['pics']);
var_dump($pics);
foreach ($pics as $pic) {
  if($pic==$img){
    unset($pic);
    unlink("../files/$img");
  }
  else{
  $pict[] = $pic;
  }
}
$pics = implode(",",$pict);
$sMasuk->update(["pics"=>"$pics"],["noRegister"=>$id]);
common::redirect("../?page=form&form=tambah&upstts=dihapus&id={$surat[0]['noRegister']}");
