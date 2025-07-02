<?php
session_start();
if (!isset($_SESSION["emp_id"]) ) {
    // Redirect to login if emp_id is not set
    header("Location: login.php");  // Use login page
    exit();
}

if(isset($_POST['inquaryDetailsFOrAboveVariable']))
{
 $inquiryDetails=$_POST['inquaryDetailsFOrAboveVariable'];
 $empId = $_SESSION["emp_id"];
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 // Update inquiry field for the logged-in employee
    $updateSql = "UPDATE employee_details SET inquary='$inquiryDetails' WHERE emp_id='$empId'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Inquiry noted";
    } else {
        echo "Error updating record: " . $conn->error;
    }

$conn->close();

?>
