<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);

      $sql1 = "SELECT * FROM Employee";
      $result1 = $conn->query($sql1);
?>
<?php 
    if (isset($_SESSION['Profle-edit-success'])){ 
        ?>
            <div class="alert alert-success" role="alert" style="text-align: center;">
                <div>
                    <strong>Yayy !</strong> <?php echo $_SESSION['Profle-edit-success']; ?>
                </div>
            </div>
        <?php
        unset($_SESSION['Profle-edit-success']);
    }
?>
<?php 
    if (isset($_SESSION['Emp-Profle-edit-success'])){ 
        ?>
            <div class="alert alert-success" role="alert" style="text-align: center;">
                <div>
                    <strong>Yayy !</strong> <?php echo $_SESSION['Emp-Profle-edit-success']; ?>
                </div>
            </div>
        <?php
        unset($_SESSION['Emp-Profle-edit-success']);
    }
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
<br>
    <h3 style="text-align: center; color:white; margin-top: 1%;">Mans profils</h3><br>
    <?php
        if (isset($_SESSION['userId'])){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                if ($row['Users_id'] == $_SESSION['userId']){
                    echo '<a style="color:white">Vārds            : '.$row['Users_firstname'].'</a>'.'<br><br>';
                    echo '<a style="color:white">Uzvārds          : '.$row['Users_lastname'].'</a>'.'<br><br>';
                    echo '<a style="color:white">E-pasts          : '.$row['Users_uid'].'</a>'.'<br><br>';
                    echo '<a style="color:white">Telefona nummurs : '.$row['Users_phone'].'</a>'.'<br><br>';
                    }
                }
            }
            echo '<br><button class="btn btn-light" style="margin-right:1%; margin-bottom:2%; margin-top:2%"><a href="profile-edit.php">Veikt izmaiņas</a></button><button class="btn btn-light" style="margin-left:1%; margin-top:2% ; margin-bottom:2%"><a href="userforums.php">Mani ieraksti</a></button><br><br>';
        }
        else if (isset($_SESSION['EmployeeId'])){
            if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {
                if ($row1['Employee_id'] == $_SESSION['EmployeeId']){
                    echo '<a style="color:white">Vārds            : '.$row1['Employee_firstname'].'</a>'.'<br><br>';
                    echo '<a style="color:white">Uzvārds          : '.$row1['Employee_lastname'].'</a>'.'<br><br>';
                    echo '<a style="color:white">E-pasts          : '.$row1['Employee_uid'].'</a>'.'<br><br>';
                    echo '<a style="color:white">Telefona nummurs : '.$row1['Employee_phone'].'</a>'.'<br><br>';
                    echo '<a style="color:white">Dzimšanas datums : '.$row1['Employee_birthdate'].'</a>'.'<br><br>';
                    }
                }
            }
            echo '<br><button class="btn btn-light" style="margin-right:1%; margin-bottom:2%; margin-top:2%"><a href="Empprofile-edit.php">Veikt izmaiņas</a></button><button class="btn btn-light" style="margin-left:1%; margin-top:2% ; margin-bottom:2%"><a href="userforums.php">Mani ieraksti</a></button><br><br>';
        }
      ?>
</div>
<?php
    include_once 'footer.php'
?>