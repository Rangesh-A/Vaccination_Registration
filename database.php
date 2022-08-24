<?php
$conn = mysqli_connect("localhost", "root", "", "vaccination_registration");
                
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>