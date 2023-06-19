<?php
if (isset($_POST['pet-edit'])) {

    session_start();
    require 'dbh.inc.php';

    $petName = $_POST['petname'];
    $petType = $_POST['pettype'];
    $petBreed = $_POST['petbreed'];
    $petOwner = $_SESSION['userId'];
    $id = $_GET['editid'];

    if (empty($petBreed) || empty($petName) || empty($petType)) {
        header("Location: ../petinfo.php?error=emtpyfields");
        exit();
    }
    else {
        mysqli_query($conn, "UPDATE Pet SET Pet_name = '$petName' , Pet_type = '$petType' , Pet_breed = '$petBreed' WHERE Pet_id=$id");
        header("Location: ../petinfo.php?updated-successfull");
        exit();
        }

}