<?php
    include_once 'header.php'
?>
<?php
    include_once 'footer.php'
?>
<?php
    if (isset($_SESSION['Profle-delete-empty-fields'])){ 
                ?>
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                        <div>
                            <strong>Uhoh !</strong> <?php echo $_SESSION['Profle-delete-empty-fields']; ?>
                        </div>
                    </div>
                <?php
                unset($_SESSION['Profle-delete-empty-fields']);
            }
    if (isset($_SESSION['Profle-delete-sql-error'])){ 
                ?>
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                        <div>
                            <strong>Hmm !</strong> <?php echo $_SESSION['Profle-delete-sql-error']; ?>
                        </div>
                    </div>
                <?php
                unset($_SESSION['Profle-delete-sql-error']);
            }
    if (isset($_SESSION['Profle-delete-pwd-wrong'])){ 
              ?>
                  <div class="alert alert-success" role="alert" style="text-align: center;">
                    <div>
                        <strong>Hey !</strong> <?php echo $_SESSION['Profle-delete-pwd-wrong']; ?>
                    </div>
                  </div>
              <?php
              unset($_SESSION['Profle-delete-pwd-wrong']);
          }
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);


    if (isset($_SESSION['userId'])){
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if ($row['Users_id'] == $_SESSION['userId']){
                echo'
                <br><br><br>
                <div class="container-sm col-lg-4 bg-dark" style="border-radius:15px;">
                    <br><h3 style="color:white">Lai dzēstu profilu ievadiet paroli</h3>
                    <form action="templates/profile-delete.inc.php" method="POST">
                        <p style="color:white">E-pasts :</p><input type="text" name="deleteemail" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                        <p style="color:white">Parole :</p><input type="password" name="deletepwd" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                        <p style="color:white">Parole atkārtoti :</p><input type="password" name="deletepwd2" class="form-control form-control-sm" style="width: 50%; margin-left: 25%">
                        <br><br><button type="submit" name="deleteuser" class="btn btn-danger">Dzēst profilu</button><br>
                        <a href="profile.php">Atcelt</a>
                        <br><br>
                    </form>           
                </div> 
                ';
                }
            }
          }
    }
?>
