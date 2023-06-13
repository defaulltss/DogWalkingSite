<style>
<?php include "static/clean.css";?>
</style>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);

      $sql_emp = "SELECT * FROM Employee";
      $result_emp = $conn->query($sql_emp);
?>
<?php
   session_start(); 
?>
<!DOCTYPE html>
<html class="html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <nav class="navbar navbar-dark bg-dark">
  <div class="container" id="navbarNav">
    <img src="static/img/logo.png" style="width: 7%">
      <?php
        if (isset($_SESSION['userId'])){
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if ($row['Users_id'] == $_SESSION['userId']){
                echo '
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-5% ; color:white">
                  <img src="static/img/userpic.png" style="width:20% ; margin-right:2%">'
                  .$row["Users_firstname"].'
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: center;">
                  <a class="dropdown-item" href="profile.php">Profils</a>
                  <a class="dropdown-item" href="listing.php">Veikt ierakstu</a>
                  <a class="dropdown-item" href="job.php">Ievietot sludinājumu</a>
                  <a class="dropdown-item" href="forums.php">Forums</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="templates/logout.inc.php">Atslēgties</a>
                </div>
                </li>
                    ';
                  }
              }
            }
      }
      else if(isset($_SESSION['EmployeeId'])){
        if ($result_emp->num_rows > 0) {
          while($EmpRow = $result_emp->fetch_assoc()) {
            if ($EmpRow['Employee_id'] == $_SESSION['EmployeeId']){
              echo '
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-5% ; color:white">
                <img src="static/img/userpic.png" style="width:20% ; margin-right:2%">'
                .$EmpRow["Employee_firstname"].'
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: center;">
                <a class="dropdown-item" href="profile.php">Profils</a>
                <a class="dropdown-item" href="listing.php">Veikt ierakstu</a>
                <a class="dropdown-item" href="job.php">Ievietot sludinājumu</a>
                <a class="dropdown-item" href="forums.php">Forums</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="templates/logout.inc.php">Atslēgties</a>
              </div>
              </li>
                ';
                }
            }
          }
      }
      else {
        echo '
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-5% ; color:white">
          <img src="static/img/userpic.png" style="width:20% ; margin-right:2%">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: center;">
          <a class="dropdown-item" href="login.php">Pieslēgties</a>
          <a class="dropdown-item" href="register.php">Reģistrēties</a>
          <a class="dropdown-item" href="forums.php">Forums</a>
        </div>
        </li>
     ';
        }
      ?>
  </div>
</nav>
<main>