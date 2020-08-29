<?php
session_start();

$conn=mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db($conn, "dbms") or die("Could not find db");

$cid = $_POST['courseid'];
$date = $_POST['date'];

mysqli_query($conn, "UPDATE course SET totalhourstaken=totalhourstaken+1 WHERE cid='$cid'");

$result = mysqli_query($conn, "SELECT * FROM attendance WHERE courseid='$cid'");
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $srollno=$row["studentrollno"];
        $query = mysqli_query($conn, "SELECT * FROM student WHERE srollno='$srollno'");
        if (mysqli_num_rows($query) > 0) {
    // output data of each row
         while($row = mysqli_fetch_assoc($query)) {
          $status=$_POST["$srollno"];
          if($status=="present"){
                  

                  if (mysqli_query($conn, "UPDATE attendance SET noofhourspresent=noofhourspresent+1 WHERE courseid='$cid' AND studentrollno='$srollno'")) {
                      //echo "Attendance updated successfully";
                  } else {
                      //echo "Error updating record: ";
                  }

          }
          else{
               
               "INSERT INTO absentdates (courseid,studentrollno, absentdates)
                VALUES ('$cid', '$srollno', '$date')";

                if (mysqli_query( $conn, "INSERT INTO absentdates (courseid,studentrollno, absentdates)
                VALUES ('$cid', '$srollno', '$date')")) {
                    //echo "Absent record created successfully";
                } else {
                    //echo "Error: " ;
                }
          }
        }
        ?>
      <script type="text/javascript">
      alert("Attendance marked successfully");
      window.location.href="markattendance.php";
      </script>
      <?php
      }
      
      else{
        echo "Student name error";
      }
    }

} else {
    //echo "No students in the course";
      ?>
      <script type="text/javascript">
      alert("No students in the course");
      window.location.href="markattendance.php";
      </script>
      <?php
}

?>
