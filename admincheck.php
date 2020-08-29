<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn, "dbms") or die("Could not find db");
$query=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");
$numrows=mysqli_num_rows($query);
if($numrows!=0){
  while($row=mysqli_fetch_assoc($query)){
    $dbpassword=$row['password'];
  }
  if($password==$dbpassword){
   $_SESSION['username']=$username;
   header("Location: admin_home.html");
   exit();
  }
  else
     {
     	?>
     	<script type="text/javascript">
     	alert("Incorrect password");
     	window.location.href="admin_check.html";
     	</script>
     	<?php
     }
 
}
else
   
   	{
     	?>
     	<script type="text/javascript">
     	alert("Invaild user");
     	window.location.href="admin_check.html";
     	</script>
     	<?php
     }
   
mysqli_close($conn);
?>
