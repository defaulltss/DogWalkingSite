<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);
?>
<br><br><br>
<div class="container-sm">
<?php
      if (isset($_SESSION['userId'])){
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if ($row['Users_id'] == $_SESSION['userId']){
                echo 'Esiet sveicināti, '.$row['Users_firstname'];
                  }
              }
            }
      }
    else {
        echo '<div style="font-size: larger;">Lai veiktu ierakstus jums ir nepieciešams <a href="login.php">pieslēgties</a> klāt platformai, ja jums jau nav izveidots konts tad droši variet <a href="register.php">reģistrēties</a></div>';
    }
?>
</div>
<?php
    include_once 'footer.php'
?>
