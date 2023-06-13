<?php
    include_once 'header.php'
?>
<?php
    include_once 'footer.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);

      if (isset($_SESSION['userId'])){
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if ($row['Users_id'] == $_SESSION['userId']){
                $name = $row['Users_firstname'];
                $lastname = $row['Users_lastname'];
                $email = $row['Users_uid'];
                echo '
                <br><br><br>
                <div class="container-sm col-lg-4 bg-dark" style="border-radius:15px;">
                    <br><h3 style="color:white">Veiciet jūsu izmaiņas</h3>
                      <form action="templates/profileedit.inc.php" method="POST">
                        <p style="color:white">Vārds :</p><input type="text" name="editname" value="'.$name.'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                        <p style="color:white">Uzvārds :</p><input type="text" name="editlastname" value="'.$lastname.'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                        <p style="color:white">E-pasts :</p><input type="text" name="edituid" value="'.$email.'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%">
                        <br><br><button type="submit" name="edituser" class="btn btn-light">Saglabāt</button><br>
                        <a href="profile.php">Atcelt</a><br>
                        <a href="profile-delete.php">Dzēst profilu</a>
                        <br><br>
                      </form>           
                </div> 
                ';
                }
            }
          }
    }
?>
