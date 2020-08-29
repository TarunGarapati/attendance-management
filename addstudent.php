<!DOCTYPE html>
<?php
session_start();
?>

<html>
  
<head>
<title>Student </title>
        
</head>
  <body style="text-align: center;">
   
  <form style="text-align: center;" action="addstudentaction.php" method="POST">

    <h1 style="text-align: center;"> Add Student </h1>
    <label for="fname">Student Name:</label>
    <input type="text"  name="sname" placeholder="student name" required> <br><br>

    <label for="lname">Student Roll.No:</label>
    <input type="text"  name="srollno" placeholder="student roll.no" required> <br><br>
    Departmentid:
    <input type="int"  name="departmentid" placeholder="deparment id" required> <br><br>
    Program:
    <input type="text"  name="program" placeholder="program" required> <br><br>
    Semester:
    <input type="int"  name="semester" placeholder="semester" required> <br><br>
    Password:
    <input type="password"  name="password" placeholder="password" required> <br><br>
    
    <input type="submit" value="Add Student">

  </form>
  <br><br>
   <a href="admin_home.html">Back to Home Page.  </a><br><br>
 </body>


</html>
