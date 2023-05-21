<?php
if (isset($_POST['post-made'])) {

    session_start();
    require 'dbh.inc.php';

    $user = $_SESSION['userId'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $about = $_POST['about'];
    $req = $_POST['req'];

    if (empty($name) || empty($breed) || empty($about) || empty($req)) {
        header("Location: ../post.php?error=emtpyfields&name=".$name."&breed=".$breed."&about".$about);
        exit();
    }
    else {
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO Listing (Animal_owner, Animal_id, Animal_breed, Animal_description, Requirements) VALUES (?,?,?,?,?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../post.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "sssss",$user, $name, $breed, $about ,$req,);
            mysqli_stmt_execute($stmt);
            header("Location: ../post.php?signup=listingmade");
            exit();
        }

    }

}