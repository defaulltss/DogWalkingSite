<?php
    if(isset($_POST['deleteuser'])){

        require 'dbh.inc.php';
        session_start();
    
        $pwd = $_POST['deletepwd'];
        $pwdrepeat = $_POST['deletepwd2'];
        $mail = $_POST['deleteemail'];
        $userid = $_SESSION['userId'];

        if (empty($pwd) || empty($pwdrepeat) || empty($mail)) {
            header("Location: ../profile-delete.php?error=emptyfields");
            exit();
        }
        else {
            $sql = "SELECT * FROM Users WHERE Users_uid=? OR Users_pwd=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
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
                        header("Location: ../profile-delete.php?error=wrongpassword");
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        
                        mysqli_query($conn, "DELETE FROM Users WHERE Users_id = $userid");
                        session_unset();
                        session_destroy();
    
                        header("Location: ../index.php?deletion=success");
                        exit();
                    } 
                    else {
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