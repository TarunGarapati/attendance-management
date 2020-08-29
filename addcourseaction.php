<?php
session_start();
$cname=$_POST['cname'];
$cid=$_POST['cid'];
$departmentid=$_POST['departmentid'];
$facultyid=$_POST['facultyid'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql="INSERT INTO course(cname,cid,departmentid,facultyid) VALUES ('".$cname."','".$cid."','".$departmentid."','".$facultyid."')";

if(mysqli_query($conn,$sql)){
    ?>
      <script type="text/javascript">
      alert("Course was added succesfully");
      window.location.href="admin_home.html";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
