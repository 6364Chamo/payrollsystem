<?php
$conn = new mysqli("localhost", "root", "", "payroll_system");

if ($conn->connect_error) {
    echo "database connection error";
}
  // getting deleting id
  if(isset($_POST['delete_emp_id']) ) {
    //Data getting
    $empId = $_POST['delete_emp_id'];

    // SQL query 
 $sql = "DELETE FROM employee_details WHERE emp_id = '$empId' "; //here error was reason is empid is a string value

if ($conn->query($sql) === TRUE) {
      if ($conn->affected_rows > 0) {
        echo "record deleted";
    } else {
        echo "no record found";
    }
} else 
{
  echo "fail to delete record: ". $conn->error ;
}

  }
$conn->close();
?>
