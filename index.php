<?php
  error_reporting(0);
  include_once("classes/classes.php");
  include_once("logic/conf.php");
  $user = $users->getDataa("=",["idUser"=>"{$_SESSION['idUser']}"]);
  if($_SESSION['login'] == "masuk"){
    include_once("layouts/master.php");
  }
  else{
    include_once("pages/login/index.php");
  }
?>