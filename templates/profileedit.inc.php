<?php 
   if(isset($_POST['edituser'])) {
    
    require 'dbh.inc.php';
    session_start();

    $sql = "SELECT * FROM Users";
    $result = $conn->query($sql);

    $name = $_POST['editname'];
    $lastname = $_POST['editlastname'];
    $uid = $_POST['edituid'];
    $userid = $_SESSION['userId'];
    
    if (empty($name) || empty($lastname) || empty($uid)) {
        $_SESSION['Profle-edit-empty-fields'] = " Lūdzu aizpildi visus lauciņus :)";
        header("Location: ../profile-edit.php?error=emtpyfields");
        exit();
    }
    else if (!filter_var($uid, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['Profle-edit-invadil-email'] = " Ievadiet korektu e-pasta adresi --> piemers@gmail.com :)";
        header("Location: ../profile-edit.php?error=invalidmail");
        exit();
    }
        $sql = "SELECT Users_uid FROM Users WHERE Users_uid=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['Profle-edit-email-inuse'] = " E-pasts jau tiek izmantots :)";
            header("Location: ../profile-edit.php?error=emailinuse");
            exit();
        }
        // else {
        //     mysqli_stmt_bind_param($stmt, "s", $uid);
        //     mysqli_stmt_execute($stmt);
        //     mysqli_stmt_store_result($stmt);
        //     $resultCheck = mysqli_stmt_num_rows($stmt);
        //     if ($resultCheck > 0) {
        //             header("Location: ../profile.php?error=emailinuse");
        //             exit();
        //         }
        //     else if (!mysqli_stmt_prepare($stmt, $sql)) {
        //             header("Location: ../profile.php?error=sqlerror");
        //             exit();
        //         }
            else {
                    mysqli_query($conn, "UPDATE Users SET Users_firstname = '$name', Users_lastname = '$lastname', Users_uid = '$uid' WHERE Users_id = $userid");
                    $_SESSION['Profle-edit-success'] = " Infromācija veiksmīgi atjaunota :)";
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