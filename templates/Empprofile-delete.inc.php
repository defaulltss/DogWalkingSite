<?php
    if(isset($_POST['Edeleteuser'])){

        require 'dbh.inc.php';
        session_start();
    
        $pwd = $_POST['Edeletepwd'];
        $pwdrepeat = $_POST['Edeletepwd2'];
        $mail = $_POST['Edeleteemail'];
        $empid = $_SESSION['EmployeeId'];

        if (empty($pwd) || empty($pwdrepeat) || empty($mail)) {
            header("Location: ../profile-delete.php?error=emptyfields");
            exit();
        }
        else {
            $sql = "SELECT * FROM Employee WHERE Employee_uid=? OR Employee_pwd=?";
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
                    $pwdCheck = password_verify($pwd, $row['Employee_pwd']);          
                    if ($pwdCheck == false) {
                        header("Location: ../Empprofile-delete.php?error=wrongpassword");
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        
                        mysqli_query($conn, "DELETE FROM Employee WHERE Employee_id = $empid");
                        session_unset();
                        session_destroy();
    
                        header("Location: ../index.php?deletion=success");
                        exit();
                    } 
                    else {
                        header("Location: ../Empprofile-delete.php?error=wrongpassword");
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