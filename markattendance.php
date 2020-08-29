<!DOCTYPE html>
<head>
</head>
<?php
session_start();
?>

<?php

$fusername=$_SESSION['fusername'];

$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn, "dbms") or die("Could not find db");


$result = mysqli_query($conn, "SELECT fid FROM faculty WHERE fusername='$fusername'");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $fid=$row["fid"];
    }
} else {
    echo "0 results";
}


$result= mysqli_query($conn,"SELECT * FROM course WHERE facultyid='$fid'");

echo "<br><br>";
    echo "Mark attendence For:";
echo "<br><br>";

?>


<form action="getcoursestudentlist.php" method="POST">
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       ?>
<input type="radio" name="attendance" value="<?php  echo $row['cid'];  ?>" required> <?php  echo $row['cname']; ?><br>
        <?php
    }
    
} else {
    echo "0 results";
}
  echo "<br><br>";
  ?>
  <input type="submit" name="submit" value="Mark" />
</form>

<?php
mysqli_close($conn);
?>
<html>
<head>
   
</head>

<body id="b" style="text-align: center;">
<br><br>
<a href="faculty_home.html">Back to Home Page.  </a><br><br>


</body>
<html>
