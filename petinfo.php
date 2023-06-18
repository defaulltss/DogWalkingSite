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
        $petOwner = $row1['Pet_owner'];
      }
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
<br>
    <h3 style="text-align: center; color:white; margin-top: 1%;">Jūsu mājdzīvnieki</h3><br>
    <?php
                if ($_SESSION['userId'] == $petOwner){
                    echo '<a style="color:white">Mājdzīvnieka vārds              : '.$row1['Pet_name'].'</a>'.'<br><br>';
                    echo '<a style="color:white">Mājdzīvnieka šķirne             : '.$row1['Pet_breed'].'</a>'.'<br><br>';
                    echo '<a style="color:white">Mājdzīvnieka tips               : '.$row1['Pet_type'].'</a>'.'<br><br>';
                    }
                else 
                echo '<a style="color:white">Jums vēl nav pievienots neviens mājdzīvnieks</a><br>';
            
            echo '<br><button class="btn btn-light" style="margin-right:1%; margin-bottom:2%; margin-top:2%"><a href="profile.php">Atpakaļ</a></button>';
      ?>
</div>
<?php
    include_once 'footer.php'
?>