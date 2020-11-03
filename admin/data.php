<?php
include("../conn.php");

$res_sql="SELECT * FROM results";
$res_query=mysqli_query($conn,$res_sql);
$rows=array();
while ($row=mysqli_fetch_array($res_query)) {
   $rows[]=$row;
}

echo json_encode($rows);



?>