<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    ?>
<head>
<meta charset="utf-8" />
<title>Table Style</title>
<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
<link rel="stylesheet" type="text/css" href="css/fcourses.css">
</head>
<?php
    $fusername=$_SESSION['fusername'];
    
    $conn=mysqli_connect("localhost","root","") or die("Could not connect!");
    mysqli_select_db($conn, "dbms") or die("Could not find db");
    
    
    $result = mysqli_query($conn, "SELECT fid FROM faculty WHERE fusername='$fusername'");
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $fid=$row['fid'];
        }
    } else {
        echo "0 results";
    }
    ?>
<body>
<div>
<h3 style="position:relative; left:600px; font-size:30px; font-family:Ubuntu-Bold;">Your Courses</h3>
</div>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">COURSE ID</th>
<th class="text-left">COURSE NAME</th>
</tr>
</thead>
<tbody class="table-hover">
<?php
    
    $query=mysqli_query($conn, "SELECT * FROM course WHERE facultyid='$fid'");
    if (mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_assoc($query)) {
            ?>
<tr>
<td class="text-left"> <?php echo $row['cid']; ?> </td>
<td class="text-left"> <?php echo $row['cname']; ?> </td>
</tr>
<?php
    
    }
    } else {
        echo "0 results";
    }
    ?>
</tbody>
</table>

<?php
    
    mysqli_close($conn);
    ?>
</body>
</html>
