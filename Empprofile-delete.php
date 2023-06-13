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
                    echo'
                    <br><br><br>
                    <div class="container-sm col-lg-4 bg-dark" style="border-radius:15px;">
                        <br><h3 style="color:white">Lai dzēstu profilu ievadiet paroli</h3>
                        <form action="templates/Empprofile-delete.inc.php" method="POST">
                            <p style="color:white">E-pasts :</p><input type="text" name="Edeleteemail" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                            <p style="color:white">Parole :</p><input type="password" name="Edeletepwd" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                            <p style="color:white">Parole atkārtoti :</p><input type="password" name="Edeletepwd2" class="form-control form-control-sm" style="width: 50%; margin-left: 25%">
                            <br><br><button type="submit" name="Edeleteuser" class="btn btn-danger">Dzēst profilu</button><br>
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
<?php
    include_once 'footer.php'
?>