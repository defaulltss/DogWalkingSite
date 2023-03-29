<?php

if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['firstname'];
    $usersurname = $_POST['lastname'];
    $email = $_POST['uid'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-1'];
    $phonenumber = $_POST['phone'];

    if (empty($username) || empty($usersurname) || empty($email) || empty($password) || empty($passwordRepeat) || empty($phonenumber)) {
        header("Location: ../register.php?error=emtpyfields&firstname=".$username."&uid=".$email."&lastname".$usersurname);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&firstname=".$username."&lastname".$usersurname);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location: ../register.php?error=passwordcheck&firstname=".$username."&uid=".$email."&lastname".$usersurname);
        exit();
    }
    else {
        
        $sql = "SELECT users_uid FROM users WHERE users_uid=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=emailinuse&firstname=".$username."&lastname".$usersurname);
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../register.php?error=emailinuse&firstname=".$username."&lastname".$usersurname);
                exit();
            }
            else {
                
                $sql = "INSERT INTO Users (Users_firstname, Users_lastname, Users_uid, Users_pwd, Users_phone) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $username, $usersurname ,$email, $hashedPwd, $phonenumber);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?signup=success");
                    exit();
                }

            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
    header("Location: ../signup.php");
    exit();
}