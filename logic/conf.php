<?php

// Session
session_start();

// Database Connection
dbmanager::setConn("localhost","root","","apps_surat");

// Post Variables
$username = $_POST['username'];
$password = $_POST['password'];
$noRegister = $_POST['noRegister'];
$tglMasuk = $_POST['tglMasuk'];
$tglSurat = $_POST['tglSurat'];
$asal = $_POST['asal'];
$idP = $_POST['idP'];
$perihal = $_POST['perihal'];
$simpan = $_POST['simpan'];
$upload = $_POST['upload'];
$ditunjuk = $_POST['ditunjuk'];
$fullname = $_POST['fullname'];
$sifatSurat = $_POST['sifat'];

// Get Variables
$notif = $_GET['notif'];
$page = $_GET['page']; 
$upstts = $_GET['upstts'];
$disposisi = $_GET['disposisi'];
$id = $_GET['id'];
$img = $_GET['img'];

// Object Define
$users = new dbmanager("users");
$sMasuk = new dbmanager("suratmasuk");
$fsMasuk = new fsmanager("file");
$sifat = new dbmanager("sifat");