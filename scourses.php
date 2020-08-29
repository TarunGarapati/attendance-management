<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/fcourses.css">
</head>
<?php
session_start();
?>

<?php
$susername=$_SESSION['susername'];

$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn, "dbms") or die("Could not find db");


$result = mysqli_query($conn, "SELECT * FROM attendance WHERE studentrollno='$susername'");

?>
<header>
   <h1 style="font-size:60px;" ><center>Elected Courses</center></h1>
</header>
  <table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<th class="text-left"> Course ID </th>
<th class="text-left"> Course Name</th>

</tr>
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
    $courseid=$row["courseid"];
    $query=mysqli_query($conn, "SELECT * FROM course WHERE cid='$courseid'");
    if (mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_assoc($query)) {
       ?>
       <tr>
       <td class="text-left"> <?php echo $courseid; ?> </td>
       <td class="text-left"> <?php echo $row['cname']; ?> </td>
       </tr>
      <?php
    }
   }
  }
} else {
    echo "0 results";
}
?>
</table>
<?php

mysqli_close($conn);
?>
<html>
<head>
   
</head>

<body id="b" style="text-align: center;">
<br><br>
<a href="student_home.html">Back to Home Page.  </a><br><br>


</body>
<html>
