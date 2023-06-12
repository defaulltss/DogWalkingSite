<?php
if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        echo ' 
        <div class="alert alert-danger" role="alert">
        A simple danger alert—check it out!
        </div>'
        ;
        exit();
    }
    else {
        $sql = "SELECT * FROM Users WHERE Users_uid=? OR Users_pwd=?";
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
                $pwdCheck = password_verify($password, $row['Users_pwd']);          
                if ($pwdCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['Users_id'];
                    $_SESSION['userUid'] = $row['Users_uid'];

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
else if (isset($_POST['Emp-login-submit'])) {

    require 'dbh.inc.php';

    $Emailuid = $_POST['Emailuid'];
    $Epassword = $_POST['Epwd'];

    if (empty($Emailuid) || empty($Epassword)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else {
        $Esql = "SELECT * FROM Employee WHERE Employee_uid=? OR Employee_pwd=?";
        $Estmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($Estmt, $Esql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else {       
            mysqli_stmt_bind_param($Estmt, "ss", $Emailuid, $Emailuid,);
            mysqli_stmt_execute($Estmt);
            $Eresult = mysqli_stmt_get_result($Estmt);                                
            if ($Erow = mysqli_fetch_assoc($Eresult)) {
                $EpwdCheck = password_verify($Epassword, $Erow['Employee_pwd']);          
                if ($EpwdCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
                else if ($EpwdCheck == true) {
                    session_start();
                    $_SESSION['EmployeeId'] = $Erow['Employee_id'];
                    $_SESSION['EmployeeUid'] = $Erow['Employee_uid'];

                    header("Location: ../index.php?Emplogin=success");
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
    header("Location: ../index.php?fail");
    exit();
}
// else {
//     header("Location: ../index.php?fail");
//     exit();
// } 
?>