<?php
$conn = new mysqli("localhost", "root", "", "payroll_system");

if ($conn->connect_error) {
    echo "database connection error";
}


  // Form data 
  if(isset($_POST['empIdResult']) && isset($_POST['salaryResult']) && isset($_POST['monthResult']) 
   ) {
    //Data 
    $empIdResult = $_POST['empIdResult'];
    $empSalaryResult = $_POST['salaryResult'];
    $empMonthResult = $_POST['monthResult'];
    // SQL query 
    $sql = "UPDATE employee_details 
        SET month = '$empMonthResult', salary = '$empSalaryResult'
        WHERE emp_id = '$empIdResult'";

if ($conn->query($sql) === TRUE) {

    if ($conn->affected_rows > 0) 
      {
            echo "Salary insert succesfully.";
       } 
  } 
else 
   {
  echo "fail to insertrecord.". $conn->error ;
 }

  }
$conn->close();
?>
