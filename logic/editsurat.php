<?php 
include_once("../classes/classes.php");
include_once("conf.php");

if(isset($simpan)){
    $update = $sMasuk->update([
      "noRegister"=>$noRegister,
      "tglMasuk"=>$tglMasuk,
      "tglSurat"=>$tglSurat,
      "asal"=>$asal,
      "perihal"=>$perihal,
    ],
    ["idSMasuk"=>$idP]
    );
    if($update > 0){
      common::redirect("../?page=form&form=edit&notif=dirubah&id=$noRegister");
    }
    else{
      common::redirect("../?page=form&form=edit&notif=datasudahada&id=$noRegister");
    }
}

if(isset($upload)){
  $surat = $sMasuk->getDataa("=",['idSMasuk'=>$idP]);
  $file = $_FILES['file'];
  if($file['error'][0]==4){
    common::redirect("../?page=form&form=edit&upstts=tidakadafile&id={$surat[0]['noRegister']}");   
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
    common::redirect("../?page=form&form=edit&upstts=diupload&id={$surat[0]['noRegister']}");
  }
}