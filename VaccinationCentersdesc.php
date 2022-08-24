<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin-Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="VaccinationCenters.css"/>
</head>
<body>
<div id="container">
  <div id="header"> <a href="AdminPage.html">Admin Page</a> </div>
  <div id="menu"> <a href="AdminPage.html">Home</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a style="color: black;" href="VaccinationCenters.php">Vaccination Centers</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="CentersAdd.html">Add Vaccination Centers</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="RemoveCenter.php">Remove Vaccination Centers</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="Analysis.php">Data Group</a>
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="UserDetails.php">User Details</a> 
    &nbsp; &nbsp; &nbsp; &nbsp; <a href="Home.html">Logout</a> </div>
  <div id="sidebar">
    <h1>Vaccination Centers</h1>
  </div>
  <div class="inputs">
      <div class="form-field">
        <table>
            <tr>
              <th>Center ID</th>
              <th>Center Name</th>
              <th>Address</th>
              <!-- <th>Doses</th> -->
            </tr>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "vaccination_registration");
               
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT center_id, centername, address, dosages FROM vaccination_centers ORDER BY center_id desc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["center_id"]. "</td><td>" . $row["centername"] . "</td><td>"
                . $row["address"]. "</td></tr>";
                }
                echo "</table>";
                } else { echo "0 results"; }
                $conn->close();
                ?>
          </table>
      </div>
      <div class="buttons" style="margin-top:200px;">
        <a href="VaccinationCentersasc.php"><button class="btn" type="submit" id="submitdata">Order by Ascending</button></a>
        <a href="VaccinationCentersdesc.php"><button class="btn" type="submit" id="submitdata">Order by Descending</button></a>
      </div>
  </div>
</div>
</body>
</html>
