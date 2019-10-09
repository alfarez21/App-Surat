<?php
include_once("../classes/classes.php");
include_once("conf.php");
$query = "SELECT * FROM users JOIN userslevel USING(idLevel) WHERE username='$username'AND password='$password'";
$dbuser = dbmanager::getDataQ($query);
if(dbmanager::checkRowsQ($query) != 0){
  if($dbuser[0]['username']==$username && $dbuser[0]['password']==$password){
    common::redirect("../index.php");
    $_SESSION["login"] = "masuk";
    $_SESSION["idUser"] = $dbuser[0]['idUser'];
    $_SESSION["level"] = $dbuser[0]['level'];
    common::redirect("../?page=beranda");
  }
  else{
    common::redirect("../index.php?notif=usersalah");
  }
}
else{
  common::redirect("../index.php?notif=usertidakada");
}