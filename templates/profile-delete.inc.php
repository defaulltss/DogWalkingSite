<?php
    if(isset($_POST['deleteuser'])){

        require 'dbh.inc.php';
        session_start();
    
        $pwd = $_POST['deletepwd'];
        $pwdrepeat = $_POST['deletepwd2'];
        $mail = $_POST['deleteemail'];
        $userid = $_SESSION['userId'];

        if (empty($pwd) || empty($pwdrepeat) || empty($mail)) {
            $_SESSION['Profle-delete-empty-fields'] = " Lūdzu aizpildi visus lauciņus :)";
            header("Location: ../profile-delete.php?error=emptyfields");
            exit();
        }
        else {
            $sql = "SELECT * FROM Users WHERE Users_uid=? OR Users_pwd=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                $_SESSION['Profle-delete-sql-error'] = " Kaut kas nogāja greizi :(";
                header("Location: ../profile.php?error=sqlerror");
                exit();
            }
            else {       
                mysqli_stmt_bind_param($stmt, "ss", $mail, $mail,);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);                                
                if ($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($pwd, $row['Users_pwd']);          
                    if ($pwdCheck == false) {
                        $_SESSION['Profle-delete-pwd-wrong'] = " Izskatās ka ievadītā parole nav parieza :(";
                        header("Location: ../profile-delete.php?error=wrongpassword");
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        
                        mysqli_query($conn, "DELETE FROM Users WHERE Users_id = $userid");

                        $_SESSION['Profle-delete-success'] = " Jūs mums pietrūksiet :(";
                        session_unset();
                        session_destroy();
                        header("Location: ../index.php?deletion=success");
                        exit();
                    } 
                    else {

                        $_SESSION['Profle-delete-pwd-wrong'] = " Izskatās ka ievadītā parole nav parieza :(";
                        header("Location: ../profile-delete.php?error=wrongpassword");
                        exit();
                    }
                }        
            }
        }
}
    else {
        header("Location: ../profile.php");
        exit();
    }

?>