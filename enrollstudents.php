<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
   
</head>

<header>
   <h1 style="font-size:40px;" ><center>Student Enrollment</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
      <form class="login-form" action="enrollstudentsaction.php" method="POST">
      <input type="text" placeholder="studentrollno" name="srollno" required /><br><br>
      <select name="courseid" required>
		  <?php
         $conn=mysqli_connect("localhost","root","") or die("Could not connect!");
         mysqli_select_db($conn, "dbms") or die("Could not find db");

            $fusername=$_SESSION['fusername'];
			$result = mysqli_query($conn, "SELECT fid FROM faculty WHERE fusername='$fusername'");
			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			        $fid=$row['fid'];
			    }
			} else {
			    echo "0 results";
			}
           $result= mysqli_query($conn, "SELECT * FROM course WHERE facultyid='$fid'");
           if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			       ?>
			       <option value='<?php echo $row['cid'];?>'><?php echo $row['cname'];?> </option>
			       <?php
			    }
			} else {
			    echo "0 results";
			}
		  ?>
	  </select><br><br>
      <input type="submit" value="Enroll"><br>
       <br><br>
   <a href="faculty_home.html">Back to Home Page.  </a><br><br>
    </form>
  </div>
</div>
</body>
<html>
