<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Pet";
      $result = $conn->query($sql);
      if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
      }
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
  <form action="templates/job.inc.php" method="POST"><br>
        <h6 style="color:white">Dzīvnieka apraksts</h6>
        <input type="text" name="about" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Nosacījumi</h6>
        <input type="text" name="req" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Mājdzīvnieks</h6>
        <select class="form-control" style="width: 50%; margin-left: 25%; text-align:center;" name="petid">
            <option >Izvēlieties mājdzīvnieku</option>
            <?php 
                while($row = $result->fetch_assoc()) {
                    if ($_SESSION['userId'] == $row['Pet_owner']){
                        echo '<option>'.$row['Pet_name'].'</option>';
                    }
                }
            ?>
        </select><br><br>
        <button type="submit" class="btn btn-light" name="job-create">Pievienot</button><br><br>
  </form>
</div>
<?php
    include_once 'footer.php'
?>