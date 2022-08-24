<?php

$email = $_POST['email'];
$username  = $_POST['username'];
$password = $_POST['password'];




if (!empty($username) || !empty($email) || !empty($password))
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
  $SELECT = "SELECT email From user_details Where email = ? Limit 1";
  $INSERT = "INSERT Into user_details (email , username ,password )values(?,?,?)";
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $email,$username,$password);
      $stmt->execute();
    header("location:UserRegister.html");
      echo '<script type="text/javascript"> alert("Registered Successfully!!!")</script>';
     } else {
      echo '<script type="text/javascript"> alert("Registeration Failed!!!")</script>';
      header("location:UserRegister.html");
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>