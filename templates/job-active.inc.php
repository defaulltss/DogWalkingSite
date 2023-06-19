<?php
if (isset($_POST['job-accept'])) {

    session_start();
    require 'dbh.inc.php';

    $sql1 = "SELECT * FROM Employee";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $listingId = $_POST['listingid'];
    $EmployeeId = $_SESSION['EmployeeId'];

    if (empty($listingId)) {
        header("Location: ../Emp-job.php?error=emtpyfields");
        exit();
    }
    else {
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO Job (Listing_id, Employee_id) VALUES (?,?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Emp-job.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $listingId, $EmployeeId);
            mysqli_stmt_execute($stmt);
            header("Location: ../index.php?signup=darbsapstirpinats");
            exit();
        }

    }


}