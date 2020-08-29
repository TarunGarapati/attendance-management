<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
   
</head>

<header>
   <h1 style="font-size:60px;" ><center>Add Course</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
      <form class="login-form" action="addcourseaction.php" method="POST">
      <input type="text" placeholder="Course Name" name="cname" required /><br><br>
      <input type="text" placeholder="Course ID" name="cid" required /><br><br>
      <input type="text" placeholder="Department Id" name="departmentid" required /><br><br>
      <select name="facultyid" required>
		  <?php
         $conn=mysqli_connect("localhost","root","") or die("Could not connect!");
         mysqli_select_db($conn, "dbms") or die("Could not find db");

           $result= mysqli_query($conn, "SELECT * FROM faculty");
           if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			       ?>
			       <option value='<?php echo $row['fid'];?>'><?php echo $row['fname'];?> </option>
			       <?php
			    }
			} else {
			    echo "0 results";
			}
		  ?>
	  </select><br><br>
      <input type="submit" value="Add Course"><br>
       
    </form>
  </div>
  <br><br>
   <a href="admin_home.html">Back to Home Page.  </a><br><br>
</div>
</body>
<html>
