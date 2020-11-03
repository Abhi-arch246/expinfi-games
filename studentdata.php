<?php
include("conn.php");
$email=$_POST['email'];

$res_sql="SELECT * FROM results WHERE email='$email'";
$res_query=mysqli_query($conn,$res_sql);
$rows=array();
while ($row=mysqli_fetch_array($res_query)) {
   $rows[]=$row;
}

echo json_encode($rows);
?>