<?php
require 'connect.php';
if(isset($_POST) and $_SERVER['REQUEST_METHOD']=="POST"){
    $start=$_POST['start'];
    $end=$_POST['end'];
    
    $select="SELECT * FROM directions WHERE source='$start' AND destination='$end'";
    if(mysqli_num_rows($query=mysqli_query($king,$select))>0){
        $fetch=mysqli_fetch_array($query);
        $dirs=$fetch['dirs'];
        echo $dirs;


    }else{
        echo 2;
    }

}

?>