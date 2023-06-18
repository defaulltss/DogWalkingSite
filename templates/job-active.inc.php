<?php
if (isset($_POST['job-accept'])) {

    session_start();
    require 'dbh.inc.php';

    $sql = "SELECT * FROM Users";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql1 = "SELECT * FROM Employee";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $listingId = $_POST['listingid'];
    $about = $_POST['about'];
    $req = $_POST['req'];
    $petCheck = $_POST['petid'];



    if (empty($about) || empty($req)) {
        header("Location: ../job.php?error=emtpyfields");
        exit();
    }
    else {
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO Listing (Animal_owner, Animal_id, Animal_description, Requirements) VALUES (?,?,?,?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../job.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssss",$owner, $petId, $about, $req);
            mysqli_stmt_execute($stmt);
            header("Location: ../job.php?signup=postmade");
            exit();
        }

    }


}