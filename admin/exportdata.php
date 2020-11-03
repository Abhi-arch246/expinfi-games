<?php
include("../conn.php");

if(isset($_POST["export"])){
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename= StudentData.csv');
    $output=fopen("php://output","w");
    fputcsv($output,array("Id","Test Name","Email","Username","Correct answers","Wrong answers","Time Taken","Test Taken on"));
    $query="SELECT * FROM results";
    $result=mysqli_query($conn,$query);
    while ($row=mysqli_fetch_assoc($result)) {
        fputcsv($output,$row);
    }
    fclose($output);
}



?>