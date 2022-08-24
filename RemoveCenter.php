<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin-Page</title>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `fname`, `lname`, `age`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "vaccination_registration");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="RemoveCenter.css"/>
</head>
<body>
<div id="container">
  <div id="header"> <a href="AdminPage.html">Admin Page</a> </div>
  <div id="menu"> <a href="AdminPage.html">Home</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="VaccinationCenters.php">Vaccination Centers</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="CentersAdd.html">Add Vaccination Centers</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a style="color: black;" href="RemoveCenter.php">Remove Vaccination Centers</a>
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="Analysis.php">Data Group</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="UserDetails.php">User Details</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="Home.html">Logout</a> </div>
  <div id="sidebar">
    <h1>Remove Centers</h1>
  </div>
  <div class="inputs">
      <div class="form-field">
        <table>
            <tr>
              <th>Center ID</th>
              <th>Center Name</th>
              <th>Address</th>
              <th>Dosages</th>
            </tr>
            <?php
              $conn = mysqli_connect("localhost", "root", "", "vaccination_registration");
                
              if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              }
              $sql = "SELECT center_id, centername, address, dosages FROM vaccination_centers";
              $result = $conn->query($sql);
                while($row = mysqli_fetch_array($result)) {
                ?>
                <tr class="<?php if(isset($classname)) echo $classname;?>">
                <td><?php echo $row["center_id"]; ?></td>
                <td><?php echo $row["centername"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["dosages"]; ?></td>
                <td><a href="RemoveCenterp.php?a=<?php echo $row['center_id']; ?>">Delete</a></td>
                </tr>
                <?php
                }
              ?>
          </table>
      </div>
  </div>
</div>
</body>
</html>
