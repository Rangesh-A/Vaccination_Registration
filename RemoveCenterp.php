<?php
$nm= $_GET['a'];
$conn = mysqli_connect("localhost", "root", "", "vaccination_registration");  
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$query="DELETE FROM vaccination_centers WHERE center_id='$nm' ";
$query_run=mysqli_query($conn,$query);
if($query_run){
    echo '<script type="text/javascript"> alert("Center Deleted Successfully!!!")</script>';
    header("location: RemoveCenter.php");
  }else{
    echo '<script type="text/javascript"> alert("Center Not Found!!!")</script>';
    header("location: RemoveCenter.php");
  }
?>