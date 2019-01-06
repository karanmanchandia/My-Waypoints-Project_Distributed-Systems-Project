<?php
require 'connect.php';
if(isset($_POST) and $_SERVER['REQUEST_METHOD']=="POST"){
    $source=$_POST['source'];
    $end=$_POST['destination'];
    $dirs=$_POST['directions'];
    $select="SELECT * FROM directions WHERE source='$source' AND destination='$end'";
    if(mysqli_num_rows($query=mysqli_query($king,$select))>0){
        
        }else{
            $insert="INSERT INTO directions(source,destination,dirs)VALUES('$source','$end','$dirs')";
    if($query=mysqli_query($king,$insert)){
        echo 1;

    }else{
        echo 2;
    }

        }




    

}

?>