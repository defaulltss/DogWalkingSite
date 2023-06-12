<?php 
   if(isset($_POST['edituser'])) {
    
    require 'dbh.inc.php';
    session_start();

    $name = $_POST['editname'];
    $lastname = $_POST['editlastname'];
    $uid = $_POST['edituid'];
    $userid = $_SESSION['userId'];
    
    if (empty($name) || empty($lastname) || empty($uid)) {
        header("Location: ../profile.php?error=emtpyfields");
        exit();
    }
    else if (!filter_var($uid, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../profile.php?error=invalidmail");
        exit();
    }
        $sql = "SELECT Users_uid FROM Users WHERE Users_uid=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../profile.php?error=emailinuse");
            exit();
        }
        // else {
        //     mysqli_stmt_bind_param($stmt, "s", $uid);
        //     mysqli_stmt_execute($stmt);
        //     mysqli_stmt_store_result($stmt);
        //     $resultCheck = mysqli_stmt_num_rows($stmt);
        //     if ($resultCheck > 0) {
        //         header("Location: ../profile.php?error=emailinuse");
        //         exit();
        //     }
        //         else if (!mysqli_stmt_prepare($stmt, $sql)) {
        //             header("Location: ../profile.php?error=sqlerror");
        //             exit();
        //         }
                    else {
                        mysqli_query($conn, "UPDATE Users SET Users_firstname = '$name', Users_lastname = '$lastname', Users_uid = '$uid' WHERE Users_id = $userid");
                        header("Location: ../profile.php?updated-successfull");
                        exit();
                    }
                }
            // }
    else {
        header("Location: ../profile.php");
        exit();
    }
?>