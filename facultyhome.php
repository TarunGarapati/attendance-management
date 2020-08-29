<!DOCTYPE html>
<?php
session_start();
?>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<?php
echo  'Welcome, ' .$_SESSION['fusername']  .'!';
?>
</div>
<html>
  
<head>
<title>Faculty Home</title>
        
</head>
  <body>

    <div style="text-align: center;">
    <h1 style="text-align: center;"> Faculty Home</h1>
    <a href="fupdateprofile.php" > Update Profile </a> <br><br>
    <a href="fcourses.php" > View Courses </a> <br><br>
    <a href="fnotifications.php" > Notifications </a><br><br>
    <a href="markattendance.php" > Mark Attendance </a><br><br>
    <a href="enrollstudents.php" > Enroll students </a><br><br>
  </div>
    
</div>
 </body>


</html>
