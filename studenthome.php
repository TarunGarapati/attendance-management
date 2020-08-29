<!DOCTYPE html>
<?php
session_start();
?>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<?php
echo  'Welcome, ' .$_SESSION['susername']  .'!';
?>
</div>
<html>
<head>
   
</head>
<header>
   <h1 style="font-size:60px;" ><center>Student Home</center></h1>
</header>
<br>
<br>
<body id="b" style="text-align: center;">
<br>
<br>

<a href="scourses.php">View My Courses.</a><br><br>
<a href="sattendance.php">View My Attendance. </a><br><br>
<a href="snotifications.php">Notifications. </a><br><br>
<a href="sprofileupdate.php">Update My profile.  </a><br><br>


</body>
<html>
