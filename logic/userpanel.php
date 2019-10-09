<?php
include_once("../classes/classes.php");
include_once("conf.php");

if(isset($simpan)){
  $update = $users->update(["fullname"=>"$fullname"],["idUser"=>"$idP"]);
  if($update>0){
    common::redirect("../?page=userpanel&notif=datadirubah");die;
  }
  else{
    common::redirect("../?page=userpanel&notif=datasudahada");die;
  }
}

if(isset($upload)){
  $file = $_FILES['file'];
  if($file['error']==4){
    common::redirect("../?page=userpanel&notif=tidakadafoto");die;  
  }
  else{
    if($file['type']=="image/png"||$file['type']=="image/jpg"){
      $filetype = explode("/",$file['type']);
      $filetype = end($filetype);
      $filename =date("YmdHis").".".$filetype;
      $users->update(["profile"=>"$filename"],["idUser"=>"$idP"]);
      move_uploaded_file($file['tmp_name'],"../Pusers/".$filename);
      common::redirect("../?page=userpanel&upstts=diupload");die;
    }
    else{
      common::redirect("../?page=userpanel&upstts=filetidakdidukung");die;
    } 
  }
}
common::redirect("../?page=userpanel");
