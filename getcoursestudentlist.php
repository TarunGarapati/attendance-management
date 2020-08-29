<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/fcourses.css">
</head>
<body bgcolor="#3e94ec">
<?php
session_start();

$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn, "dbms") or die("Could not find db");

$cid=$_POST['attendance'];
?>
 <header>
   <h1 style="font-size:60px;" ><center><?php echo $cid;?></center></h1>
</header>
<?php
$result = mysqli_query($conn,"SELECT * FROM attendance WHERE courseid='$cid'");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
   
    ?>
    <form action="attendanceaction.php" method="POST" style="text-align: center;">
    <input type="hidden" name="courseid" value="<?php echo "$cid";?>"> <br>
    Attendance Date:<input type="Date" name="date"><br><br><br>
    
    <table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <th class="text-left"> Student Roll No </th>
        <th class="text-left"> Student Name</th>
        <th class="text-left"> Present</th>
        <th class="text-left"> Absent</th>

        </tr>
<?php
    while($row = mysqli_fetch_assoc($result)) {
        $srollno=$row["studentrollno"];
        $query = mysqli_query($conn, "SELECT * FROM student WHERE srollno='$srollno'");
        if (mysqli_num_rows($query) > 0) {
    // output data of each row
         while($row = mysqli_fetch_assoc($query)) {
          ?>
          <tr>
          <td class="text-left"> <?php echo $srollno; ?></td>
          <td class="text-left"> <?php echo $row['sname']; ?></td>
         <td class="text-left"> <input type="radio" name="<?php echo "$srollno"; ?>" value="present" checked="checked" >Present</td>
         <td class="text-left"> <input type="radio" name="<?php echo "$srollno"; ?>" value="absent" >Absent</td>
         </tr>
          <?php
         }
      }
      
      else{
        echo "Student name error";
      }
    }
    ?>
    </table>
    <br>
    <input type="submit" name="submit" value="Mark">
    </form>
    <?php
} else {
    echo "No students in the course";
}

?>
<br><br>
  <p style="text-align:center;">
<a href="markattendance.php" style="text-align:center;">Back to Attendance Page.  </a><br><br>
</p>
</body>
</html>

