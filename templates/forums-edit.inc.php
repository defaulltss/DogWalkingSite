<?php
if (isset($_POST['userforums-edit'])) {

    session_start();
    require 'dbh.inc.php';

    $postSubject = $_POST['editsubject'];
    $postText = $_POST['edit-about-subject'];
    $id = $_GET['forumsid'];

    if (empty($postSubject) || empty($postText)) {
        header("Location: ../userforums-edit.php?error=emtpyfields");
        exit();
    }
    else {
        mysqli_query($conn, "UPDATE Post SET Post_subject = '$postSubject' , Post_text = '$postText' WHERE Post_id=$id");
        header("Location: ../userforums.php?updated-successfull");
        exit();
        }

}