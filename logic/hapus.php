<?php
include_once("../classes/classes.php");
include_once("conf.php");

if($sMasuk->delete(["idSMasuk"=>$id]) > 0 ){
  common::redirect("../?page=daftarsurat&stts=dihapus");
}
else{
  common::redirect("../?page=daftarsurat&stts=kesalahansistem");
}