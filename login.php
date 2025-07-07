<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_system";



if (isset($_POST['username']) && isset($_POST['usernamepassword'])) 
{
    $userName = $_POST['username'];
    $passwords = $_POST['usernamepassword'];

$adminUserNames=['admin1','admin2','admin3','admin4'];                                //admin usernames
$adminLogginPassword='admin123';                                                      //admin password
$loggedInAdmin=false;                                                                //admin forloop boolen value
$payRollUserNames=['payroll1','payroll2','payroll3','payroll4'];                      //payroll user names
$payRollLogginPassword='payroll123';                                                  //payroll password
$loggedInPayRoll=false; 

if (in_array($userName, $adminUserNames) && $passwords == $adminLogginPassword) {      //find match login details in admin arry
    echo "Admin login successfully!";
    exit; // 🛑 Stop execution after success
}

if (in_array($userName, $payRollUserNames) && $passwords == $payRollLogginPassword) {   //find match login details in admin arry
    echo "Payroll login successfully!";
    exit; // 🛑 Stop execution after success
}


//checking from database values
$conn = new mysqli($servername, $username, $password, $dbname);                      //db cnnection
$sql = "SELECT emp_id,password FROM employee_details ";                     //sql quary
$result = $conn->query($sql);
$dbUserNames = [];                                                                   //arry to hold db username value
$dbPasswords = [];                                                                   //array to hold db paasword values


// If rows are found
if ($result->num_rows > 0) {
    // Fetch all rows and store usernames and passwords in arrays
    while ($row = $result->fetch_assoc()) {
        $dbUserNames[] = $row['emp_id'];   // Store usernames in the array           
        $dbPasswords[] = $row['password'];    // Store passwords in the array
        $loginSuccess = false;                                                                //boolean value 
    }

    // Now check if the user input matches any entry in the arrays
    for ($i = 0; $i < count($dbUserNames); $i++) {
        // Check if user input matches the username and password at index $i
        if ($userName == $dbUserNames[$i] && $passwords == $dbPasswords[$i]) 
        {   $_SESSION["username"]=$userName;
            $loginSuccess = true;

            break;
        }
    }
        if ($loginSuccess) {
            echo "success"; 
            $_SESSION["emp_id"]="$userName";
            exit(); // script execution stop 
        } 

        
         if (!$loginSuccess) {                                                //out when no matching record found
            echo "Invalid username or password!";
        }

        }
else
{
    echo 'wrong user name or pasword!';                                         
}

$conn->close();

}
?>


