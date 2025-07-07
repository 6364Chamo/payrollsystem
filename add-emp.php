<?php
$conn = new mysqli("localhost", "root", "", "payroll_system");

if ($conn->connect_error) {
    echo "database connection error";
}


  // getting Form data 
  if(isset($_POST['emp_id']) && isset($_POST['emp_password']) && isset($_POST['emp_name']) &&
   isset($_POST['emp_address']) && isset($_POST['emp_contact'])) {
    //Data 
    $empId = $_POST['emp_id'];
    $empPassword = $_POST['emp_password'];
    $empName = $_POST['emp_name'];
    $empAddress = $_POST['emp_address'];
    $empContact = $_POST['emp_contact'];
  
   


    // SQL query 
    $sql = "INSERT INTO employee_details(emp_id,password,EMP_NAME,EMP_ADDRESS,EMP_CONTACT_NUMBER)
    VALUES ('$empId','$empPassword','$empName','$empAddress','$empContact')";

if ($conn->query($sql) === TRUE) {
  echo "record created";
} else {
  echo "fail to create record: ". $conn->error ;
}

  }
$conn->close();
?>

