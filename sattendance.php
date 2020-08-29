<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/fcourses.css">
</head>
<?php
session_start();
?>

<header>
<h1 style="font-size:60px" ><center>Attendance</center></h1>
</header>
<?php

$srollno=$_SESSION['susername'];

$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn, "dbms") or die("Could not find db");


$result = mysqli_query($conn, "SELECT courseid FROM attendance WHERE studentrollno='$srollno'");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
  ?>
  <table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<th class="text-left"> Course ID </th>
<th class="text-left"> Course Name</th>
<th class="text-left"> Percentage </th>
<th class="text-left"> No of Hours present</th>
<th class="text-left"> NO of Hours taken </th>
<th class="text-left"> Check</th>

</tr>
<?php
   
    while($row = mysqli_fetch_assoc($result)) {
        $cid=$row["courseid"];
        $que= mysqli_query($conn, "SELECT noofhourspresent FROM attendance WHERE courseid='$cid' AND studentrollno='$srollno'");
        if (mysqli_num_rows($que) > 0) {
   
        while($row = mysqli_fetch_assoc($que)) {
          $hours=$row["noofhourspresent"];
        }
      }

      $quer= mysqli_query($conn, "SELECT totalhourstaken,cname FROM course WHERE cid='$cid'");
        if (mysqli_num_rows($quer) > 0) {
   
        while($row = mysqli_fetch_assoc($quer)) {
          $totalhours=$row["totalhourstaken"];
          $cname=$row["cname"];
        }
      }
      if($totalhours>0)
      $percentage=(($hours)/($totalhours))*100;
      else
      $percentage=0;
    ?>
<tr>
<td class="text-left"><?php echo $cid;?> </td>
<td class="text-left"><?php echo $cname;?> </td>
<td class="text-left"><?php echo $percentage;?> </td>
<td class="text-left"><?php echo $hours;?> </td>
<td class="text-left"><?php echo $totalhours;?> </td>


      <form action="viewabsentdates.php" method="POST">
        
          <input type="hidden" name="studentrollno" value="<?php  echo $row["srollno"];   ?>" />
         
          <input type="hidden" name="courseid" value="<?php  echo $cid; ?>" />
          <input type="hidden" name="cname" value="<?php  echo $cname; ?>" />
          
          <td class="text-left"><input type="submit" name="submit" value="Check absent dates" /></td>
          <br>
      </form>
</tr>
     <?php
    }

} else {
    //echo "0 results";
}

?>
</table>
<br><br>
<html>

<body style="text-align:center;">
<a href="student_home.html" style="text-align:center;">Back to Home Page.  </a><br><br>
</body>
</html>


