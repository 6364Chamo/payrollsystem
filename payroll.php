<?php
//for json encoding
header('Content-Type: application/json');
if(isset($_POST['empIdInput']))
{
 $empIdInputByUser=$_POST['empIdInput'];
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

 // data retrived quary
    $dataRetriveQuary= "SELECT EMP_NAME,EMP_CONTACT_NUMBER,month,inquary from employee_details WHERE emp_id='$empIdInputByUser'";
    $result = $conn->query($dataRetriveQuary);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $showEmpName = $row["EMP_NAME"];
    $showEmpContact = $row["EMP_CONTACT_NUMBER"];
    $showEmpMonth= $row["month"];
    $showEmpInquary=$row["inquary"];
    //send data json format to frontend this is the method there is no other method send to frond end retrive data
    echo json_encode([
    'showEmpName' => $showEmpName,
    'message' =>'Data successfully retrieved!',
    'showEmpContact' => $showEmpContact,
    'showEmpMonth' => $showEmpMonth,
    'showEmpInquary'=>$showEmpInquary
    ]);
   

} else {
    //also should encode to json method to check in the js file(check ) 
     echo json_encode(['message' => 'Employee not found']);
    exit;
}

$conn->close();

?>

