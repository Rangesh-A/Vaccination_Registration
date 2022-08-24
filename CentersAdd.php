<?php

$centername = $_POST['centername'];
$address  = $_POST['address'];
$dosages = $_POST['dosages'];

if (!empty($centername) || !empty($address) || !empty($dosages))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vaccination_registration";



$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT centername From vaccination_centers Where centername = ? Limit 1";
  $INSERT = "INSERT Into vaccination_centers (centername , address ,dosages )values(?,?,?)";


     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $address);
     $stmt->execute();
     $stmt->bind_result($address);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $centername,$address,$dosages);
      $stmt->execute();
      header("location: CentersAdd.html");
      echo '<script type="text/javascript"> alert("Center Added Successfully!!!")</script>';
     } else {
      echo '<script type="text/javascript"> alert("Center with same address Already Found!!!")</script>';
      header("location: CentersAdd.html");
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>