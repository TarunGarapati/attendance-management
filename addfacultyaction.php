<?php
session_start();
$fname=$_POST['fname'];
$departmentid=$_POST['departmentid'];
$fusername=$_POST['fusername'];
$password=$_POST['password'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql="INSERT INTO faculty(fusername,fname,departmentid,fpassword) VALUES ('".$fusername."','".$fname."','".$departmentid."','".$password."')";

if(mysqli_query($conn,$sql)){
    ?>
      <script type="text/javascript">
      alert("Faculty was added succesfully");
      window.location.href="admin_home.html";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
