 <!DOCTYPE html>
<?php
session_start();
?>

<html>
  
<head>
<title>Add Faculty</title>
        
</head>
  <body style="text-align: center;">
   
  <form style="text-align: center;" action="addfacultyaction.php" method="POST">

      <h1 style="text-align: center;"> Add Faculty </h1>
    <label >Faculty Name</label>
    <input type="text"  name="fname" placeholder="Faculty Name" required> <br><br>

    <label >Deparment ID</label>
    <input type="text"  name="departmentid" placeholder="Deparment ID" required> <br><br>

    <label>Faculty Username</label>
    <input type="text"  name="fusername" placeholder="Username" required> <br><br>

    <label>Password</label>
    <input type="text"  name="password" placeholder="Password" required> <br><br>

    <!--<label for="Date of Joining" name="dateofjoining">Date of Joining</label>
    <input type="date" id="dateofjoining" name="dateofjoing" placeholder="Date of Joining"> 


      <input id="date" name="date">

<script type="text/javascript">
  document.getElementById('date').value = Date(); </script>
<br><br>
-->
    

    

    <input type="submit" value="Add Faculty">

  </form>
<br><br>
   <a href="admin_home.html">Back to Home Page.  </a><br><br>

 </body>


</html>
