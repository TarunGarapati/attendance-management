<!DOCTYPE html>
<?php
session_start();
?>

<?php

$srollno=$_SESSION['susername'];

$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn, "dbms") or die("Could not find db");

$x=0;
$result = mysqli_query($conn, "SELECT courseid FROM attendance WHERE studentrollno='$srollno'");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    
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
      $percentage=($hours)/($totalhours)*100;
      else
      $percentage=0;

      if($percentage<80.00 && $totalhours!=0){
      echo "Your Attendance for the course:  ";
      echo $cid;
      echo "  is low  ";
      echo $percentage;
      echo "<br>";
      echo "<br>";
      $x=1;
      }
    }
} else {
    
}

$que= mysqli_query($conn, "SELECT * FROM leav WHERE studentrollno='$srollno'");
  
if (mysqli_num_rows($que) > 0) {
   
        while($row = mysqli_fetch_assoc($que)) {
         echo "Your Leave request for ";
         echo $row['fname'];
         echo "  to the course  ";
         echo $row['cname'];
         echo "  from   ";
         echo $row['fromdate'];
         echo "   to  ";
         echo $row['todate'];
         echo "  is  ";
         echo $row['status'];
         echo "<br>";

         echo "<br>";

        }
      }else {
      	if($x==0)
         echo "No New notifications";
}


?>
<br><br>
<a href="student_home.html">Back to Home Page.  </a><br><br>


