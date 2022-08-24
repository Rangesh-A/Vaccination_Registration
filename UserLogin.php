<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vaccination_registration";


$email = $_POST['email'];
$password = $_POST['password'];

$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
$query="SELECT * FROM user_details WHERE email='$email' and password='$password'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)==1){
    // echo('login success');
    session_start();
    $_SESSION['vaccination_registration']='true';
    header('location:UserUi.html');
}
else{
  echo 'Wrong Username or Password';
}
?>