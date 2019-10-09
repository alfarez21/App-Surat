<?php
  class dbmanager{

    private $table;
    private static $conn;

    // Set Database Connection
    public static function setConn($host,$user,$pass,$db){
      return self::$conn = mysqli_connect($host,$user,$pass,$db) or die("error connect");
    }

    // Set Table
    public function __construct($table){
      return $this->table = $table;
    }

    // Check Rows In Table
    public function checkRows(){
      $conn = self::$conn;
      $table = $this->table;
      $sql = mysqli_query($conn,"SELECT * FROM $table");
      return mysqli_num_rows($sql);
    }

    // Check Rows In Table with Query
    public static function checkRowsQ($query){
      $conn = self::$conn;
      $sql = mysqli_query($conn,$query) or die("error");
      return mysqli_num_rows($sql);
    }

    // Get All Data Form Table
    public function getData(){
      $conn = self::$conn;
      $table = $this->table;
      $sql = mysqli_query($conn,"SELECT * FROM $table");
      while($data = mysqli_fetch_assoc($sql)){
        $rows[] = $data; 
      }
      return $rows;
    }

    // Get Data From Table with Query
    public static function getDataQ($query){
      $conn = self::$conn;
      $sql = mysqli_query($conn,$query) or die("error");
      while($data = mysqli_fetch_assoc($sql)){
        $rows[] = $data; 
      }
      return $rows;
    }

    // Get All Data Form Table
    public function getDataa($logic, array $criteria){
      $conn = self::$conn;
      $table = $this->table;
      $column = array_keys($criteria);
      $column = implode($column);
      $value = $criteria[$column];
      $value = str_replace("'","&apos;",$value);
      $sql = mysqli_query($conn,"SELECT * FROM $table WHERE $column $logic '$value'");
      while($data = mysqli_fetch_assoc($sql)){
        $rows[] = $data; 
      }
      return $rows;
    }

    // Insert Data To Table
    public function insert(array $data){
      $conn = self::$conn;
      $table = $this->table;
      $column = array_keys($data);
      for ($i=0; $i < count($data); $i++) { 
        $key = $column[$i];
        $value = $data[$key];
        $value = htmlspecialchars(trim($value));
        $value = str_replace("'","&apos;",$value);
        $values[] = "'$value'";
      }
      $columns = implode(",",$column);
      $values = implode(",",$values);
      mysqli_query($conn, "INSERT INTO $table ($columns) VALUES ($values)") or die("error");      
      return mysqli_affected_rows($conn);
    }

    // Delete Data From Table
    public function delete(array $criteria){
      $conn = self::$conn;
      $table = $this->table;
      $column = array_keys($criteria);
      $column = implode($column);
      $value = $criteria[$column];
      mysqli_query($conn, "DELETE FROM $table WHERE $column='$value'") or die("error");      
      return mysqli_affected_rows($conn);
    }

    // Update Data From Table
    public function update(array $data,array $criteria){
      $conn = self::$conn;
      $table = $this->table;
      $columns = array_keys($data);
      for($i = 0;$i < count($columns);$i++){
        $column = $columns[$i];
        $value = $data[$column];
        $column = htmlspecialchars(trim($column));
        $value = str_replace("'","&apos;",$value);
        $value = htmlspecialchars(trim($value));
        $dt[] = "$column='$value'";
      }
      $dt = implode(",",$dt);
      $key = array_keys($criteria);
      $key = implode($key);
      $value = $criteria[$key];
      mysqli_query($conn, "UPDATE $table SET $dt WHERE $key='$value'") or die("error");      
      return mysqli_affected_rows($conn);
    }
  }