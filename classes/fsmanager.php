<?php
class fsmanager{

  
  private $file;

  // Set File Object
  public function __construct($name){
    return $this->file = $_FILES[$name];
  }

  // Upload Data
  public function upload($dest){
    $file = $this->file;
    if(move_uploaded_file($file["tmp_name"], "$dest/". $file["name"])){
        return true;
    }
    else{
        return false;
    }
  }

  // Upload Data and Set File Name
  public function uploadN($name,$dest){
    $file = $this->file;
    $extention = explode(".",$file['name']);
    $extention = end($extention);
    if(move_uploaded_file($file["tmp_name"], "$dest/". $name.".".$extention)){
        return true;
    }
    else{
        return false;
    }
  }

  // Get File Type
  public function type(){
    $file = $this->file;
    return $file['type'];
  }

  // Get File Size
  public function size(){
    $file = $this->file;
    return $file['size'];
  }

  // Get File Name
  public function name(){
    $file = $this->file;
    return $file['name'];
  }

  // Get Error Status
  public function error(){
    $file = $this->file;
    return $file['error'];
  }
}