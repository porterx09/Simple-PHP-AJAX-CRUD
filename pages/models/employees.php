<?php

include_once('../../system/database/db.php');

class Employees extends Db {
  
  public $status = false;
  
  public function __construct()
  {
    parent::__construct();
  }
  
  public function getData()
  {
    $query = "SELECT * FROM employees";
    
    if($res = $this->query($query))
    {
      return $res;
    }
    else
    {
      return $this->status;
    }
  }
  
  public function getDataById($employee_id)
  {
    $query = "SELECT *
              FROM employees
              WHERE employee_id = $employee_id";
    
    if($res = $this->query($query))
    {
      return $this->fetch($res);
    }
    else
    {
      return $this->status;
    }
  }
  
  public function create($data)
  {
    $query = "INSERT INTO
              employees(firstname, 
                        middlename, 
                        lastname) 
              VALUES('".$data['firstname']."',
                     '".$data['middlename']."',
                     '".$data['lastname']."')";
    
    if($this->query($query))
    {
      $data['employee_id'] = $this->insert_id();
      return $data;
    }
    else
    {
      return $this->status;
    }
  }
  
  public function deleteById($employee_id)
  {
    $query = "DELETE FROM employees
              WHERE employee_id = $employee_id";
    
    if($this->query($query))
    {
      $this->status = true;
    }
    
    return $this->status;
  }
  
  public function updateById($data)
  {
    $query = "UPDATE employees
              SET firstname = '".$data['firstname']."',
                  middlename = '".$data['middlename']."',
                  lastname = '".$data['lastname']."'
              WHERE employee_id = ".$data['employee_id']."";
    
    if($this->query($query))
    {
      $this->status = true;
    }
    
    return $this->status;
  }
  
}