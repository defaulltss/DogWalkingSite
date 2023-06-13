<?php 
   if(isset($_POST['Eedituser'])) {
    
    require 'dbh.inc.php';
    session_start();

    $name = $_POST['Eeditname'];
    $lastname = $_POST['Eeditlastname'];
    $uid = $_POST['Eedituid'];
    $empid = $_SESSION['EmployeeId'];
    
    if (empty($name) || empty($lastname) || empty($uid)) {
        $_SESSION['Emp-Profile-edit-empty-fields'] = " Lūdzu aizpildi visus lauciņus :)";
        header("Location: ../profile.php?error=emtpyfields");
        exit();
    }
    else if (!filter_var($uid, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['Emp-Profile-edit-invadil-email'] = " Ievadiet korektu e-pasta adresi --> piemers@gmail.com :)";
        header("Location: ../profile.php?error=invalidmail");
        exit();
    }
        $sql = "SELECT Employee_uid FROM Employee WHERE Employee_uid=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['Emp-Profle-edit-email-inuse'] = " E-pasta adresi jau izmanto kāds cits lietotājs :/";
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
                        mysqli_query($conn, "UPDATE Employee SET Employee_firstname = '$name', Employee_lastname = '$lastname', Employee_uid = '$uid' WHERE Employee_id = $empid");
                        $_SESSION['Emp-Profle-edit-success'] = " Dati tika veiksmigi atjaunoti :)";
                        session_unset();
                        session_destroy();
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