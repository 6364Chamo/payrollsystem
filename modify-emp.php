<?php
$conn = new mysqli("localhost", "root", "", "payroll_system");

if ($conn->connect_error) {
    echo "database connection error";
}

  // getting Form data 
  if(isset($_POST['modify_emp_id']) && isset($_POST['modify_emp_password']) && isset($_POST['modify_emp_name']) &&
   isset($_POST['modify_emp_address']) && isset($_POST['modify_emp_contact'])) {
    //holding data
    $empId = $_POST['modify_emp_id'];
    $empPassword = $_POST['modify_emp_password'];
    $empName = $_POST['modify_emp_name'];
    $empAddress = $_POST['modify_emp_address'];
    $empContact = $_POST['modify_emp_contact'];
  
    // SQL query 
    $sql = "UPDATE  employee_details SET password='$empPassword',EMP_NAME='$empName',EMP_ADDRESS='$empAddress',EMP_CONTACT_NUMBER='$empContact'
    WHERE emp_id='$empId' ";

if ($conn->query($sql) === TRUE) {
          if ($conn->affected_rows > 0) 
          {
            echo "update succesfully";
         } else 
         {
        echo "couldnt to update record";
        }
 } 
 else 
 {
  echo "fail to update record: ". $conn->error ;
}

  }
$conn->close();
?>

