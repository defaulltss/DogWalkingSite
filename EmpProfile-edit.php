<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Employee";
      $result = $conn->query($sql);

      if (isset($_SESSION['EmployeeId'])){
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if ($row['Employee_id'] == $_SESSION['EmployeeId']){
                $name = $row['Employee_firstname'];
                $lastname = $row['Employee_lastname'];
                $email = $row['Employee_uid'];
                }
            }
          }
    }
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px; height: 40%">
    <br><h3 style="color:white">Veiciet jūsu izmaiņas</h3>
      <form action="templates/profileedit.inc.php" method="POST">
        <p style="color:white">Vārds :</p><input type="text" name="editname" value="<?=$name?>" class="input">
        <p style="color:white">Uzvārds :</p><input type="text" name="editlastname" value="<?=$lastname?>" class="input">
        <p style="color:white">E-pasts :</p><input type="text" name="edituid" value="<?=$email?>" class="input">
      </form>           
    <br><button type="submit" name="edituser" class="btn btn-light">Saglabāt</button><br>
    <a href="profile.php">Atcelt</a>
</div> 