<?php
    include_once 'header.php'
?>
<?php
    include_once 'footer.php'
?>
<?php
    if (isset($_SESSION['Emp-Profile-edit-empty-fields'])){ 
                ?>
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                      <div>
                          <strong>Uhoh !</strong> <?php echo $_SESSION['Emp-Profile-edit-empty-fields']; ?>
                      </div>
                    </div>
                <?php
                unset($_SESSION['Emp-Profile-edit-empty-fields']);
            }
    if (isset($_SESSION['Emp-Profile-edit-invadil-email'])){ 
                ?>
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                      <div>
                          <strong>Hmm !</strong> <?php echo $_SESSION['Emp-Profile-edit-invadil-email']; ?>
                      </div>
                    </div>
                <?php
                unset($_SESSION['Emp-Profile-edit-invadil-email']);
            }
    if (isset($_SESSION['Emp-Profle-edit-email-inuse'])){ 
              ?>
                  <div class="alert alert-success" role="alert" style="text-align: center;">
                    <div>
                        <strong>Hey !</strong> <?php echo $_SESSION['Emp-Profle-edit-email-inuse']; ?>
                    </div>
                  </div>
              <?php
              unset($_SESSION['Emp-Profle-edit-email-inuse']);
          }
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Employee";
      $result = $conn->query($sql);

        if (isset($_SESSION['EmployeeId'])){
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if ($row['Employee_id'] == $_SESSION['EmployeeId']){
                  $Ename = $row['Employee_firstname'];
                  $Elastname = $row['Employee_lastname'];
                  $Eemail = $row['Employee_uid'];
                  echo '
                  <br><br><br>
                  <div class="container-sm col-lg-4 bg-dark" style="border-radius:15px;">
                      <br><h3 style="color:white">Veiciet jūsu izmaiņas</h3>
                        <form action="templates/Empprofile-edit.inc.php" method="POST">
                          <p style="color:white">Vārds :</p><input type="text" name="Eeditname" value="'.$Ename.'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                          <p style="color:white">Uzvārds :</p><input type="text" name="Eeditlastname" value="'.$Elastname.'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                          <p style="color:white">E-pasts :</p><input type="text" name="Eedituid" value="'.$Eemail.'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%">
                          <br><br><button type="submit" name="Eedituser" class="btn btn-light">Saglabāt</button><br>
                          <a href="profile.php">Atcelt</a><br>
                          <a href="Empprofile-delete.php">Dzēst profilu</a>
                          <br><br>
                        </form>           
                  </div> 
                  ';
                  }
              }
            }
      }
?>