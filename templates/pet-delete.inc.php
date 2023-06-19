<?php
if (isset($_GET['deleteid'])){

    include_once 'dbh.inc.php';
    $id=$_GET['deleteid'];

    $sql="DELETE FROM Pet WHERE Pet_id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: ../petinfo.php?deletion=success");
    }
    else{
        die(mysqli_error($conn));
    }   
}