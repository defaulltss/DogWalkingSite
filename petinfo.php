<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);

      $sql1 = "SELECT * FROM Pet";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0){
        $row1 = $result1->fetch_assoc();
        $petOwnerCheck = $_SESSION['userId'];
        $petOwner = $row1['Pet_owner'];
      }
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
<br>
    <h3 style="text-align: center; color:white; margin-top: 1%;">Jūsu mājdzīvnieki</h3><br>
    <?php       
                      if (isset($_SESSION['userId'])){
                        if ($result1->num_rows > 0) {
                          while($row1 = $result1->fetch_assoc()) {
                            if ($_SESSION['userId'] == $row1['Pet_owner']){
                                echo '
                                <div class="card w-10 mb-4" style="text-alignt:center;">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row1['Pet_name'].'</h5>
                                    <p class="card-text">'.$row1['Pet_breed'].'</p>
                                    <p class="card-text">'.$row1['Pet_type'].'</p>
                                    <a href="#" class="btn btn-primary btn-success" style="margin-right:1%">labot</a><a href="#" class="btn btn-primary btn-danger" style="margin-left:1%">dzēst</a>
                                </div>
                                </div>
                                ';
                                }
                            }
                          }
                    }

            echo '<br><button class="btn btn-light" style="margin-right:1%; margin-bottom:2%; margin-top:2%"><a href="profile.php">Atpakaļ</a></button>';
      ?>
</div>
<?php
    include_once 'footer.php'
?>