<?php
if (isset($_POST['pet-create'])) {

    session_start();
    require 'dbh.inc.php';

    $petName = $_POST['petname'];
    $petType = $_POST['pettype'];
    $petBreed = $_POST['petbreed'];
    $petOwner = $_SESSION['userId'];

    if (empty($petBreed) || empty($petName) || empty($petType)) {
        header("Location: ../petcreate.php?error=emtpyfields");
        exit();
    }
    else {
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO pet (Pet_name, Pet_breed, Pet_type, Pet_owner) VALUES (?,?,?,?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../petcreate.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssss",$petName, $petBreed, $petType, $petOwner);
            mysqli_stmt_execute($stmt);
            header("Location: ../petcreate.php?signup=listingmade");
            exit();
        }

    }

}