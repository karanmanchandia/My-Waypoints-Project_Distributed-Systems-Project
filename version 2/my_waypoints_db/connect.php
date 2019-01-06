<?php
$host="localhost";
$user="root";
$password="";
$database="my_waypoints";
$king=mysqli_connect($host,$user,$password,$database)or die("we did not connect to database");
if($king->connect_error){
    die('Error No:'.$king->connect_errno.'error:'.$king->connect_error);

}

?>