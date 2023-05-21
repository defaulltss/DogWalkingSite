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


<div class="container-fluid">
  <div class="underhero" style="text-align:center">
  <br><Br><br>
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
      else if(isset($_SESSION['EmployeeId'])){
        if ($result_emp->num_rows > 0) {
          while($EmpRow = $result_emp->fetch_assoc()) {
            if ($EmpRow['Employee_id'] == $_SESSION['EmployeeId']){
              echo 'Esiet sveicināti, '.$EmpRow['Employee_firstname'];
                }
            }
          }
      }
      ?>
  </div>
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-8"style="border-radius:20px; margin-top:2%"><img src="static/img/qiciesmsrwwesgo86jfl.jpg" class="col-sm-10" style="border-radius:20px; margin-top:2%"></div>
        <div class="col-sm-4"style="border-radius:20px; margin-top:2%"><strong>Nedaudz par mums</strong><br><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius rerum nostrum praesentium exercitationem asperiores delectus doloribus nihil enim eaque quasi sapiente inventore, hic porro dolorum temporibus possimus odit ad error. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt eligendi aliquam, amet inventore voluptatem iusto. Omnis autem facere ut aut, molestias placeat, sed minus non, animi saepe pariatur nulla quaerat!</p></div>
      </div>
    </div>
    <br><Br>
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-4" style="margin-top:3%;"><strong>Nedaudz par mums</strong><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, voluptates? Incidunt minima delectus perferendis exercitationem minus maiores corporis similique et, reprehenderit distinctio, facere hic vero fugiat laudantium commodi ex dolore! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus ipsa deserunt cupiditate minus consequatur velit maiores neque provident minima! Eveniet omnis deleniti dolorum. Maxime hic quaerat consequatur magnam consequuntur dolorum.</p></div>
        <div class="col-sm-8" style="margin-top:2%;"><img src="static/img/xdog-on-leash-crossing-street,P20on,P20blue,P20leash.jpg.pagespeed.ic.Bj5wwlA3RP.jpg" class="col-sm-10" style="margin-top:2%; border-radius:20px; height:80%; width:80%"></div>
      </div>
    </div>
</div>
<?php
    include_once 'footer.php'
?>