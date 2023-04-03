<?php
// else if (isset($_POST['Emp-login-submit'])) {

//     require 'dbh.inc.php';

//     $Emailuid = $_POST['Emailuid'];
//     $Epassword = $_POST['Epwd'];

//     if (empty($Emailuid) || empty($Epassword)) {
//         header("Location: ../login.php?error=emptyfields");
//         exit();
//     }
//     else {
//         $Esql = "SELECT * FROM Employee WHERE Employee_uid=? OR Employee_pwd=?";
//         $Estmt = mysqli_stmt_init($conn);
//         if (!mysqli_stmt_prepare($Estmt, $Esql)) {
//             header("Location: ../login.php?error=sqlerror");
//             exit();
//         }
//         else {       
//             mysqli_stmt_bind_param($Estmt, "ss", $Emailuid, $Emailuid,);
//             mysqli_stmt_execute($Estmt);
//             $Eresult = mysqli_stmt_get_result($Estmt);                                
//             if ($Erow = mysqli_fetch_assoc($Eresult)) {
//                 $EpwdCheck = password_verify($Epassword, $Erow['Employee_pwd']);          
//                 if ($EpwdCheck == false) {
//                     header("Location: ../login.php?error=wrongpassword");
//                     exit();
//                 }
//                 else if ($EpwdCheck == true) {
//                     session_start();
//                     $_SESSION['EmployeeId'] = $row['Employee_id'];
//                     $_SESSION['EmployeeUid'] = $row['Employee_uid'];

//                     header("Location: ../index.php?login=success");
//                     exit();
//                 } 
//                 else {
//                     header("Location: ../login.php?error=wrongpassword");
//                     exit();
//                 }
//             }        
//             else {
//                 header("Location: ../login.php?error=nouser");
//                 exit();
//             }
//         }
//     }

// }
// else {
//     header("Location: ../index.php?fail");
//     exit();
// } 
?>