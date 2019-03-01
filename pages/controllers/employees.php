<?php

include_once('../models/employees.php');

$function = $_GET['f'];
$employeesModel = new Employees;

$status = false;
$data = array();

switch($function) {
  case 'getData':
    if($employees = $employeesModel->getData())
    {
      foreach($employees as $employee)
      {
        $data[] = array(
          'employee_id' => $employee['employee_id'],
          'firstname' => $employee['firstname'],
          'middlename' => $employee['middlename'],
          'lastname' => $employee['lastname']
        );
      }
    }
    
    echo json_encode(array('data' => $data));
    break;
    
  case 'getDataById':
    $employee_id = $employeesModel->sanitize($_POST['employee_id']);
    
    if($data = $employeesModel->getDataById($employee_id))
    {
      $status = true;
    }
    
    echo json_encode(array('status' => $status, 'data' => $data));
    break;
    
  case 'create':
    $data = array(
      'firstname' => $employeesModel->sanitize($_POST['firstname']),
      'middlename' => $employeesModel->sanitize($_POST['middlename']),
      'lastname' => $employeesModel->sanitize($_POST['lastname'])
    );
    
    if($data = $employeesModel->create($data))
    {
      $status = true;
    }

    echo json_encode(array('status' => $status, 'data' => $data));
    break;
    
  case 'deleteById':
    $employee_id = $employeesModel->sanitize($_POST['employee_id']);
    
    if($employeesModel->deleteById($employee_id))
    {
      $status = true;
    }
    
    echo json_encode(array('status' => $status));
    break;
    
  case 'updateById':
    $data = array(
      'employee_id' => $employeesModel->sanitize($_POST['employee_id']),
      'firstname' => $employeesModel->sanitize($_POST['firstname']),
      'middlename' => $employeesModel->sanitize($_POST['middlename']),
      'lastname' => $employeesModel->sanitize($_POST['lastname'])
    );
    
    if($employeesModel->updateById($data))
    {
      $status = true;
    }
    
    echo json_encode(array('status' => $status, 'data' => $data));
    break;
    
  default:
    header('Location: ../error/404.php');
    break;
}