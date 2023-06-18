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
        $_SESSION['signup-empty-fields'] = " Izskatās ka kāds no laukiem nav aizpildīts";
        header("Location: ../register.php?error=emtpyfields&firstname=".$username."&uid=".$email."&lastname".$usersurname);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['signup-nonvalid-email'] = " Lūdzu ievadiet kroektu e-pasta adresi : piemers@inbox.lv";
        header("Location: ../register.php?error=invalidmail&firstname=".$username."&lastname".$usersurname);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        $_SESSION['signup-pwd-wrong'] = " Izskatās ka paroles nesakrīt";
        header("Location: ../register.php?error=passwordcheck&firstname=".$username."&uid=".$email."&lastname".$usersurname);
        exit();
    }
    else {
        
        $sql = "SELECT Users_uid FROM Users WHERE Users_uid=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['signup-email-inuse'] = " Izskatās ka datubāzē jau ir lietotājs ar šādu e-pastu";
            header("Location: ../register.php?error=emailinuse&firstname=".$username."&lastname".$usersurname);
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                $_SESSION['signup-email-inuse'] = " Izskatās ka datubāzē jau ir lietotājs ar šādu e-pastu";
                header("Location: ../register.php?error=emailinuse&firstname=".$username."&lastname".$usersurname);
                exit();
            }
                $sql = "SELECT Users_uid FROM Users WHERE Users_phone=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $_SESSION['signup-phone-inuse'] = " Izskatās ka datubāzē jau ir lietotājs ar šādu telefona numuru";
                    header("Location: ../register.php?error=phoneinuse");
                    exit();
                }
                    mysqli_stmt_bind_param($stmt, "s", $phonenumber);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0) {
                        $_SESSION['signup-phone-inuse'] = " Izskatās ka datubāzē jau ir lietotājs ar šādu telefona numuru";
                        header("Location: ../register.php?error=phoneinuse");
                        exit();
                    }
                        else {
                            
                            $sql = "INSERT INTO Users (Users_firstname, Users_lastname, Users_uid, Users_pwd, Users_phone) VALUES (?, ?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                $_SESSION['signup-sql-eror'] = " Kaut kas nogāja greizi, mēgini vēlreiz";
                                header("Location: ../register.php?error=sqlerror");
                                exit();
                            }
                            else {
                                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                                mysqli_stmt_bind_param($stmt, "sssss", $username, $usersurname ,$email, $hashedPwd, $phonenumber);
                                mysqli_stmt_execute($stmt);
                                $_SESSION['signup-success'] = " Jūs esat veiksmīgi reģistrējies";
                                header("Location: ../login.php?signup=success");
                                exit();
                            }

                        }
                    }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);

            }
else if (isset($_POST['Esignup-submit'])) {

    require 'dbh.inc.php';

    $Eusername = $_POST['Efirstname'];
    $Eusersurname = $_POST['Elastname'];
    $Eemail = $_POST['Euid'];
    $Epassword = $_POST['Epwd'];
    $EpasswordRepeat = $_POST['Epwd-1'];
    $Ephonenumber = $_POST['Ephone'];
    $Ebirthdate = $_POST['date'];

    if (empty($Eusername) || empty($Eusersurname) || empty($Eemail) || empty($Epassword) || empty($EpasswordRepeat) || empty($Ephonenumber) || empty($Ebirthdate)) {
        $_SESSION['emp-signup-empty-fields'] = " Lūdzu aizpildiet visus lauciņus";
        header("Location: ../EmpRegister.php?error=emtpyfields&firstname=".$username."&uid=".$email."&lastname".$usersurname);
        exit();
    }
    else if (!filter_var($Eemail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emp-singup-nonvalid-email'] = " lūdzu ievadiet korektu e-pasta adresi : piemers@inbox.lv";
        header("Location: ../EmpRegister.php?error=invalidmail&firstname=".$Eusername."&lastname".$Eusersurname);
        exit();
    }
    else if ($Epassword !== $EpasswordRepeat) {
        $_SESSION['emp-signup-pwd-wrong'] = " Izskatās ka ievadītās paroles nesakrīt";
        header("Location: ../register.php?error=passwordcheck&firstname=".$Eusername."&uid=".$Eemail."&lastname".$Eusersurname);
        exit();
    }
    else {
        
        $sql1 = "SELECT Employee_id FROM Employee WHERE Employee_uid=?";
        $stmt1 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt1, $sql1)) {
            $_SESSION['emp-signup-email-inuse'] = " Izskatās ka datubāzē jau ir lietotājs ar šādu e-pastu";
            header("Location: ../EmpRegister.php?error=emailinuse&firstname=".$Eusername."&lastname".$Eusersurname);
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt1, "s", $Eemail);
            mysqli_stmt_execute($stmt1);
            mysqli_stmt_store_result($stmt1);
            $resultCheck1 = mysqli_stmt_num_rows($stmt1);
            if ($resultCheck1 > 0) {
                $_SESSION['emp-signup-email-inuse'] = " Izskatās ka datubāzē jau ir lietotājs ar šādu e-pastu";
                header("Location: ../EmpRegister.php?error=emailinuse&firstname=".$Eusername."&lastname".$Eusersurname);
                exit();
            }
                $sql1 = "SELECT Employee_id FROM Employee WHERE Employee_phone=?";
                $stmt1 = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                    $_SESSION['emp-signup-phone-inuse'] = " Izskatās ka datubāzē jau ir lietotājs ar šādu telefona numuru";
                    header("Location: ../EmpRegister.php?error=phoneinuse");
                    exit();
                }
                    mysqli_stmt_bind_param($stmt1, "s", $Ephonenumber);
                    mysqli_stmt_execute($stmt1);
                    mysqli_stmt_store_result($stmt1);
                    $resultCheck1 = mysqli_stmt_num_rows($stmt1);
                    if ($resultCheck1 > 0) {
                        $_SESSION['emp-signup-phone-inuse'] = " Izskatās ka datubāzē jau ir lietotājs ar šādu telefona numuru";
                        header("Location: ../EmpRegister.php?error=phoneinuse");
                        exit();
                    }
                else {
                
                $sql1 = "INSERT INTO Employee (Employee_firstname, Employee_lastname, Employee_uid, Employee_pwd, Employee_phone, Employee_birthdate) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt1 = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                    $_SESSION['emp-signup-sql-eror'] = " Kaut kas nogāja greizi";
                    header("Location: ../EmpRegister.php?error=sqlerror");
                    exit();
                }
                else {
                    $EhashedPwd = password_hash($Epassword, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt1, "ssssss", $Eusername, $Eusersurname ,$Eemail, $EhashedPwd, $Ephonenumber, $Ebirthdate);
                    mysqli_stmt_execute($stmt1);
                    $_SESSION['emp-signup-success'] = " Jūsu reģistrācija ir veiksmīga";
                    header("Location: ../EmpLogin.php?signup=success");
                    exit();
                }

            }
        }
    }
    mysqli_stmt_close($stmt1);
    mysqli_close($conn);

}
else {
    header("Location: ../signup.php");
    exit();
}