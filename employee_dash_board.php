<?php
session_start();

if (!isset($_SESSION["emp_id"])) {
    // Redirect to login if emp_id is not set
    header("Location: login.php");  // Use login page
    exit();
}

$empId = $_SESSION["emp_id"];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Always fetch fresh data for the current user
$sql = "SELECT EMP_NAME, EMP_CONTACT_NUMBER, month, salary FROM employee_details WHERE emp_id='$empId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $empName = $row["EMP_NAME"];
    $empContact = $row["EMP_CONTACT_NUMBER"];
    $month = $row["month"];
    $salary = $row["salary"];
} else {
    echo "Employee not found.";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Employee Dashboard</title>
  <link rel="stylesheet" href="employee_dash_board.css"/>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="images\employee_dash_board.js"></script>
</head>
<body>
  <div class="dashboard-container">
    <h1>Employee Dashboard</h1>
    <div class="employee-panel">
      <h2>Employee Panel</h2>
      
      <div class="employee-details">
        <label for="empid">EMP_ID: </label>
        <input type="text" value="<?php echo $empId ?>" id="empid" readonly/>
        <label for="empname">EMP_NAME:</label>
        <input type="text" value="<?php echo $empName ?>" id="empname" readonly><br>
        <label for="empcontact">EMP_CONTACT_NUMBER:</label>
        <input type="tel" value="<?php echo $empContact ?>" id="empcontact" readonly /><br>
      </div>
    </div>
    <div class="salary-section">
      <label for="empmonth" >Month:</label>
      <input type="text" id="empmonth" value="<?php echo $month ?>" readonly/>
      
      <label for="empsalary">My_Salary:</label>
      <input type="text" id="empsalary" value="<?php echo $salary ?>" readonly />
       <label for="salary-inquary">Inquiry for Salary:</label>
        <div class="salary-inquiry" >
        <textarea id="salary-inquary"></textarea>
         </div>
         <div id="salary-msg"></div>
         <button id="submit-inquary">Submit</button>
        </div>
       </div>
</body>
</html>


