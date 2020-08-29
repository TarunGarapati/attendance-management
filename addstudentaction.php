<?php
session_start();
$sname=$_POST['sname'];
$srollno=$_POST['srollno'];
$departmentid=$_POST['departmentid'];
$program=$_POST['program'];
$semester=$_POST['semester'];
$password=$_POST['password'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql="INSERT INTO student(sname,srollno,departmentid,program,semester) VALUES ('".$sname."','".$srollno."','".$departmentid."','".$program."','".$semester."')";

$que="INSERT INTO studentprofile(susername,spassword) VALUES ('".$srollno."','".$password."')";

if(mysqli_query($conn,$que)){
    
}
else{
echo 'Error';
}




if(mysqli_query($conn,$sql)){
    ?>
      <script type="text/javascript">
      alert("Student was added succesfully");
      window.location.href="admin_home.html";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
