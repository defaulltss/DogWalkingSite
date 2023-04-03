<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);
?>


<div class="body">
  <br><br><br><br>
  <div class="underhero">
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
      else if(isset($_SESSION['employeeid'])){
      }
      else {
        echo 'Lai veiktu ierakstus jums ir nepieciešams pieslēgties klāt platformai, ja jums jau nav izveidots konts tad droši variet <a href="register.php">reģistrēties</a>';
        }
      ?>
  </div>
</div>
<?php
    include_once 'footer.php'
?>