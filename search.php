<?php
  $centerid=$_POST['centerid'];
  $connection=mysqli_connect("localhost","root","");
  $db =mysqli_select_db($connectio,'vaccination_registeration');
  if(isset($_POST['centerid']))

    $id=$_POST['centerid'];
    $query="select * from vaccination_centers where center_id='$id' ";
    $squery_run=mysql_query($connection,$qery);

    while($row=mysqli_fetch_array($query_run))
    {
      ?>
        <form action="" method="POST">
            <input type="text" name="centerid" value="<?php echo $roe['id']?/>"
            <input type="text" name=centername"value=<?php echo $roe['id']?"/>"
            <input type="text" name=address"value=<?php echo $roe['id']?"/>"
            <input type="text" name=dosages"value=<?php echo $roe['id']?"/>"
        </form>
<?php
    }
  }  
?>