<?php
if (isset($_POST['login-submit'])) {

    session_start();
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        $_SESSION['Login-empty-fields'] = "Lūdzu aizpildi visus lauciņus :)";
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM Users WHERE Users_uid=? OR Users_pwd=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['Login-sql-error'] = "Kaut kas nogāja greizi, mēģini vēlreiz";
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
                    $_SESSION['Login-pwd-wrong'] = "Izskatās ka parole nav pareiza :/";
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['Users_id'];
                    $_SESSION['userUid'] = $row['Users_uid'];

                    $_SESSION['Login-success'] = " Esi sviecināts protālā";
                    header("Location: ../index.php?login=success");
                    exit();
                } 
                else {
                    $_SESSION['Login-pwd-wrong'] = "Izskatās ka parole nav pareiza :/";
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
            }        
            else {
                $_SESSION['Login-no-user'] = "Izskatās ka konts ar šādu e-pastu nav mūsu sistēmā :/";
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }

}
else if (isset($_POST['Emp-login-submit'])) {

    session_start();
    require 'dbh.inc.php';

    $Emailuid = $_POST['Emailuid'];
    $Epassword = $_POST['Epwd'];

    if (empty($Emailuid) || empty($Epassword)) {
        $_SESSION['Emp-Login-empty-fields'] = "Lūdzu aizpildi visus lauciņus :)";
        header("Location: ../EmpLogin.php?error=emptyfields");
        exit();
    }
    else {
        $Esql = "SELECT * FROM Employee WHERE Employee_uid=? OR Employee_pwd=?";
        $Estmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($Estmt, $Esql)) {
            $_SESSION['Emp-Login-sql-error'] = " Kaut kas nogāja greizi, mēģini vēlreiz :/";
            header("Location: ../EmpLogin.php?error=sqlerror");
            exit();
        }
        else {       
            mysqli_stmt_bind_param($Estmt, "ss", $Emailuid, $Emailuid,);
            mysqli_stmt_execute($Estmt);
            $Eresult = mysqli_stmt_get_result($Estmt);                                
            if ($Erow = mysqli_fetch_assoc($Eresult)) {
                $EpwdCheck = password_verify($Epassword, $Erow['Employee_pwd']);          
                if ($EpwdCheck == false) {
                    $_SESSION['Emp-Login-pwd-wrong'] = " Izskatās ka ievadītā parole nav pareiza :(";
                    header("Location: ../EmpLogin.php?error=wrongpassword");
                    exit();
                }
                else if ($EpwdCheck == true) {
                    session_start();
                    $_SESSION['EmployeeId'] = $Erow['Employee_id'];
                    $_SESSION['EmployeeUid'] = $Erow['Employee_uid'];

                    $_SESSION['Emp-Login-success'] = " Esi sviecināts protālā";
                    header("Location: ../index.php?Emplogin=success");

                    exit();
                } 
                else {
                    $_SESSION['Emp-Login-pwd-wrong'] = " Izskatās ka ievadītā parole nav pareiza :(";
                    header("Location: ../EmpLogin.php?error=wrongpassword");
                    exit();
                }
            }        
            else {
                $_SESSION['Emp-Login-no-user'] = "Izskatās ka konts ar šādu e-pastu nav mūsu sistēmā :/";
                header("Location: ../EmpLogin.php?error=nouser");
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