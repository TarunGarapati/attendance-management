<?php
session_start();
$srollno=$_POST['srollno'];
$courseid=$_POST['courseid'];
echo $courseid;
$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
  die("Connection failed: " .mysqli_connect_error());
}


$que="INSERT INTO attendance(studentrollno,courseid) VALUES ('".$srollno."','".$courseid."')";


if(mysqli_query($conn,$que)){
      ?>
      <script type="text/javascript">
      alert("Student was enrolled successfully");
      window.location.href="enrollstudents.php";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
