<?php
session_start();
$susername=$_POST['susername'];
$spassword=$_POST['spassword'];
$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn,"dbms") or die("Could not find db");
$query=mysqli_query($conn,"SELECT * FROM studentprofile WHERE susername='$susername'");
$numrows=mysqli_num_rows($query);
if($numrows!=0){
  while($row=mysqli_fetch_assoc($query)){
    $dbpassword=$row['spassword'];
  }
  if($spassword==$dbpassword){
   $_SESSION['susername']=$susername;
   header("Location: student_home.html");
   exit();
  }
  else
     {
      ?>
      <script type="text/javascript">
      alert("Incorrect password");
      window.location.href="student_check.html";
      </script>
      <?php
     }
 
}
else
   {
      ?>
      <script type="text/javascript">
      alert("Invalid user");
      window.location.href="student_check.html";
      </script>
      <?php
     }
mysql_close($conn);
?>
