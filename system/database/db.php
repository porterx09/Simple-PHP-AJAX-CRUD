<?php

class Db {
  
  protected $host = 'localhost';
  protected $user = 'root';
  protected $pass = '';
  protected $dbname = 'php_ajax_crud';
  protected $con;
  
  public function __construct()
  {
    $this->connect();
  }
  
  protected function connect()
  {
    $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
    if(!$this->con)
    {
      header('Location: ../../pages/error/503.html');
    }
  }
  
  public function query($query) 
  {
    return mysqli_query($this->con, $query);
  }
  
  public function fetch($res) 
  {
    return mysqli_fetch_assoc($res);
  }
  
  public function insert_id()
  {
    return mysqli_insert_id($this->con);
  }
  
  public function sanitize($data) 
  {
    $data = mysqli_real_escape_string($this->con, $data);
    $data = stripslashes($data);
    return $data;
  }
}