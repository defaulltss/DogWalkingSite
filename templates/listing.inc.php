<?php
if (isset($_POST['listing-made'])) {

    session_start();
    require 'dbh.inc.php';

    $user = $_SESSION['userId'];
    $subject = $_POST['subject'];
    $text = $_POST['about-subject'];


    if (empty($subject) || empty($text)) {
        header("Location: ../listing.php?error=emtpyfields");
        exit();
    }
    else {
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO Post (User_id, Post_subject, Post_text) VALUES (?,?,?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../listing.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "sss",$user, $subject, $text,);
            mysqli_stmt_execute($stmt);
            header("Location: ../listing.php?signup=postmade");
            exit();
        }

    }

}