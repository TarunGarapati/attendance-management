<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
   
</head>

<header>
   <h1 style="font-size:60px;" ><center>Add Department</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
      <form class="login-form" action="adddepartmentaction.php" method="POST">
      <input type="text" placeholder="Department Name" name="dname" required /><br><br>
      <input type="text" placeholder="Department ID" name="did" required /><br><br>
      
      <input type="submit" value="Add Department"><br>
       
    </form>
  </div>
  <br><br>
   <a href="admin_home.html">Back to Home Page.  </a><br><br>
</div>
</body>
<html>

