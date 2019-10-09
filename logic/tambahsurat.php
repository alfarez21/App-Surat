<?php 
include_once("../classes/classes.php");
include_once("conf.php");

if(isset($simpan)){
  $cekQuery = "SELECT * FROM suratmasuk WHERE noRegister='$noRegister'";
  if(dbmanager::checkRowsQ($cekQuery) == "0"){
    $insert = $sMasuk->insert([
      "noRegister"=>$noRegister,
      "tglMasuk"=>$tglMasuk,
      "tglSurat"=>$tglSurat,
      "asal"=>$asal,
      "perihal"=>$perihal,
      "idDisposisi"=>2,
      "idStts"=>2,
      "idBacaL"=>2
    ]);
    if($insert > 0){
      common::redirect("../?page=form&form=tambah&notif=ditambahkan&id=$noRegister");
    }
    else{
      common::redirect('../?page=form&form=tambah&notif=kesalahansistem');
    }
  }
  else{
    common::redirect('../?page=form&form=tambah&notif=datasudahada');
  }
}

if(isset($upload)){
  $surat = $sMasuk->getDataa("=",['idSMasuk'=>$idP]);
  $file = $_FILES['file'];
  if($file['error'][0]==4){
    common::redirect("../?page=form&form=tambah&upstts=tidakadafile&id={$surat[0]['noRegister']}");   
  }
  else{
    for($i = 0;$i < count($file['name']);$i++){
      if($file['type'][$i]=="image/png"||$file['type'][$i]=="image/jpg"){
        $filetype = explode("/",$file['type'][$i]);
        $filetype = end($filetype);
        $filename =date("YmdHis")."$i.".$filetype;
        $fSurat[] = $filename;
        move_uploaded_file($file['tmp_name'][$i],"../files/".$filename);
      }
    }
    $ftSurat = implode(",",$fSurat);
    if($surat[0]['pics']!=""){
      $ftSurat .= ",".$surat[0]['pics'];
    }
    $sMasuk->update(["pics"=>"$ftSurat"],['idSMasuk'=>$idP]);
    common::redirect("../?page=form&form=tambah&upstts=diupload&id={$surat[0]['noRegister']}");
  }
}