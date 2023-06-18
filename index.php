<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);

      $sql_emp = "SELECT * FROM Employee";
      $result_emp = $conn->query($sql_emp);
?>
<?php
    if (isset($_SESSION['Login-success'])){ 
                ?>
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                      <div>
                          <strong>Yay !</strong> <?php echo $_SESSION['Login-success']; ?>
                      </div>
                    </div>
                <?php
                unset($_SESSION['Login-success']);
            }
    if (isset($_SESSION['Emp-Login-success'])){ 
                ?>
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                      <div>
                          <strong>Hmm </strong> <?php echo $_SESSION['Emp-Login-success']; ?>
                      </div>
                    </div>
                <?php
                unset($_SESSION['Emp-Login-success']);
            }
    if (isset($_SESSION['Profle-delete-success'])){ 
              ?>
                  <div class="alert alert-success" role="alert" style="text-align: center;">
                    <div>
                        <strong>Hey !</strong> <?php echo $_SESSION['Profle-delete-success']; ?>
                    </div>
                  </div>
              <?php
              unset($_SESSION['Profle-delete-success']);
          }
?>
<div class="container-fluid">
  <div class="underhero" style="text-align:center">
  <?php
      if (isset($_SESSION['userId'])){
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if ($row['Users_id'] == $_SESSION['userId']){
               echo '<br><br> Esiet sveicināti, '.$row['Users_firstname'];
                  }
              }
            }
      }
      else if(isset($_SESSION['EmployeeId'])){
        if ($result_emp->num_rows > 0) {
          while($EmpRow = $result_emp->fetch_assoc()) {
            if ($EmpRow['Employee_id'] == $_SESSION['EmployeeId']){
              echo '<br><br> Esiet sveicināti, '.$EmpRow['Employee_firstname'];
                }
            }
          }
        
      }
      else 
      echo '
      <div class="hero" style="text-align: center; margin-top:2%">
      <h3 style="font-family:Cambria, Cochin, Georgia, Times, serif">Esiet sveicināti</h3>
      <p style="font-family: Cambria, Cochin, Georgia, Times, serif;">Ja jūs vēlaties mūsu pakalpojumus dorši reģistrējaties un sākat savu piedzīvojumu</p>
      </div>
      ';
      ?>
  </div>
</div>
<br><br>

<div class="" style="text-align: center;">
    <img src="static/img/115.jpg" style="width: 100%; height:75%;">
</div>
<!-- <br><br><br>
<div class="container text-center" style="text-align: center;">
  <div class="row align-items-start">
    <div class="col" style="margin-left: 4%;">
    <div class="card text-center mb-2" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Nedaudz par to ko mēs darām</h5>
          <p class="card-text">Mūsu mazās kompānijas mērķis ir izstrādat vietni kurā jauni vai jau pieredzējuši mājdzīvnieku īpašnieki var nākt un dalīties viens ar otru par savām pieredzēm saistībā ar mājdzīvniekiem</p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-left: 8%;">
      <div class="card text-center mb-2" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Nedaudz par mums</h5>
          <p class="card-text">Esam maza kompānija par kuru rūpejas viens cilvēks, kompānijas mērķis ir sasniegt visāda veida mājdzīvnieku saimniekus, gan pieredzējušus, gan arī tādus kuriem pieredzes nav, lai censtos uzlabot dzīvi ne tikai mājdzīvniekiem, bet arī saimniekiem, lai zinātu kā par ko parūpēties </p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-left: 8%;">
    <div class="card text-center mb-6" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div> -->
<?php
    include_once 'footer.php'
?>