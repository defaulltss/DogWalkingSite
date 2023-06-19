<?php
if (isset($_GET['forumsdeleteid'])){

    include_once 'dbh.inc.php';
    $id=$_GET['forumsdeleteid'];

    $sql="DELETE FROM Post WHERE Post_id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: ../userforums.php?deletion=success");
    }
    else{
        die(mysqli_error($conn));
    }   
}