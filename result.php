<?php

include("conn.php");

$correct=$_POST["correct"];
$wrong=$_POST["wrong"];
$email=$_POST['email'];
$time=$_POST['time'];
$username=$_POST["user"];
$test_name=$_POST['test_name'];
$test_category=$_POST['test_category'];
$batch=$_POST['batch'];
$submitted_at=$_POST['submitted_at'];

		
$sql="INSERT INTO results(test_name,username,examlevel,batchid,email,correct,wrong,time,submitted_at) VALUES ('$test_name','$username','$test_category','$batch','$email','$correct','$wrong','$time','$submitted_at')";
mysqli_query($conn,$sql);


?>