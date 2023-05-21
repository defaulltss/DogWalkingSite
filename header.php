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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Četras Ķepas</a>
      <?php
        if (isset($_SESSION['userId'])){
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if ($row['Users_id'] == $_SESSION['userId']){
                echo '
                    <a class="nav-link" href="listing.php" style="font-size:large; color:white">Veikt ierakstu</a>

                    <a class="nav-link" href="job.php" style="font-size:large; color:white">Ievietot sludinājumu</a>

                    <a class="nav-link" href="forums.php" style="font-size:large; color:white">Forums</a>

                    <a class="nav-link" href="profile.php" style="font-size:large; color:white">Profils</a>

                    <a class="nav-link" href="templates/logout.inc.php" style="font-size:large; color:white">Atslēgties</a>
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
                  <a class="nav-link" href="index.php" style="font-size:large; color:white">Sākums</a>

                  <a class="nav-link" href="forums.php" style="font-size:large; color:white">Veikt ierakstu</a>

                  <a class="nav-link" href="job.php" style="font-size:large; color:white">Meklēt sludinājumus</a>

                  <a class="nav-link" href="profile.php" style="font-size:large; color:white">Profils</a>

                <a class="nav-link" href="templates/logout.inc.php" style="font-size:large; color:white">Atslēgties</a>
                ';
                }
            }
          }
      }
      else {
        echo '
            <a class="nav-link"  href="index.php" style="font-size:large; color:white">Sākums</a>

            <a class="nav-link" href="useroremp.php" style="font-size:large; color:white">Pieslēgties</a>

            <a class="nav-link" href="register.php" style="font-size:large; color:white">Reģistrācija</a>

            <a class="nav-link" href="EmpRegister.php" style="font-size:large; color:white">Darbinieka reģistrācija</a>
     ';
        }
      ?>
  </div>
</nav>
<main>