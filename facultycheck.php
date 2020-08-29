<?php
session_start();
$fusername=$_POST['fusername'];
$fpassword=$_POST['fpassword'];
$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn,"dbms") or die("Could not find db");
$query=mysqli_query($conn,"SELECT * FROM faculty WHERE fusername='$fusername'");
$numrows=mysqli_num_rows($query);
if($numrows!=0){
  while($row=mysqli_fetch_assoc($query)){
    $dbpassword=$row['fpassword'];
  }
  if($fpassword==$dbpassword){
   $_SESSION['fusername']=$fusername;
   header("Location: faculty_home.html");
   exit();
  }
  else
     {
      ?>
      <script type="text/javascript">
      alert("Incorrect password");
      window.location.href="faculty_check.html";
      </script>
      <?php
     }
 
}
else
   {
      ?>
      <script type="text/javascript">
      alert("Invalid user");
      window.location.href="faculty_check.html";
      </script>
      <?php
     }
mysql_close($conn);
?>
