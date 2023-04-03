<?php

if (isset($_POST['Eogin-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['Emailuid'];
    $password = $_POST['Epwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM Employee WHERE Employee_uid=? OR Employee_pwd=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else {       
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid,);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);                                
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['Employee_pwd']);          
                if ($pwdCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['employeeid'] = $row['Employee_id'];
                    $_SESSION['employeeUid'] = $row['Employee_uid'];

                    header("Location: ../index.php?login=success");
                    exit();
                } 
                else {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
            }        
            else {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }

}
else {
    header("Location: ../index.php");
    exit();
}