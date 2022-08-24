<?php

$username = $_POST['username'];
$email  = $_POST['email'];
$centerid = $_POST['centerid'];
$date = $_POST['date'];



if (!empty($username) || !empty($server) || !empty($centerid))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vaccination_registration";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From applied_users Where email = ? Limit 1";
  $INSERT = "INSERT Into applied_users (username , email ,centerid,date )values(?,?,?,?)";
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $username,$email,$centerid,$date);
      $stmt->execute();
    header("location:ApplyVaccination.html");
      echo '<script type="text/javascript"> alert("Registered Successfully!!!")</script>';
     } else {
      echo '<script type="text/javascript"> alert("Registeration Failed!!!")</script>';
      header("location:ApplyVaccination.html");
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>