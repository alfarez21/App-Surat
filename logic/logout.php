<?php 
include_once("../classes/classes.php");
include_once("conf.php");

session_destroy();
common::redirect("../index.php");