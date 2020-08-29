<!DOCTYPE html>
<?php
session_start();
?>

<?php

$studentrollno=$_SESSION['susername'];

$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn, "dbms") or die("Could not find db");
$courseid=$_POST['courseid'];
$cname=$_POST['cname'];

$result = mysqli_query($conn, "SELECT * FROM absentdates WHERE studentrollno='$studentrollno' AND courseid='$courseid'");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
      echo $cname;
      echo "<br><br>";
    while($row = mysqli_fetch_assoc($result)) {
        
        echo $row['absentdates'];
        echo "<br>";

        }
      

     

} else {
    echo "No absent dates";
}

?>
<br><br>
<a href="sattendance.php">Back to Page.  </a><br><br>

