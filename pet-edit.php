<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);

      $sql1 = "SELECT * FROM Pet";
      $result1 = $conn->query($sql1);

      $id = $_GET['editid'];
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
<br>
    <h3 style="text-align: center; color:white; margin-top: 1%;">Jūsu mājdzīvnieki</h3><br>
    <?php       
                      if (isset($_SESSION['userId'])){
                        if ($result1->num_rows > 0) {
                          while($row1 = $result1->fetch_assoc()) {
                            if ($row1['Pet_id'] == $id){
                                echo '
                                <form action="templates/pet-edit.inc.php?editid='.$row1['Pet_id'].'" method="POST">
                                    <h6 style="color:white">Vārds uz ko dzīvnieks atsaucas</h6>
                                    <input type="text" name="petname" value="'.$row1['Pet_name'].'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                                    <h6 style="color:white">Mājdzīvnieka tips</h6>
                                    <input type="text" name="pettype" value="'.$row1['Pet_type'].'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                                    <h6 style="color:white">Mājdzīvnieka šķirna</h6>
                                    <input placeholder="Franču buldogs" value="'.$row1['Pet_breed'].'" type="text" name="petbreed" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                                    <button type="submit" class="btn btn-primary btn-success" style="margin-right:1%" name="pet-edit">labot</button>
                                    <br><button class="btn btn-light" style="margin-right:1%; margin-bottom:2%; margin-top:2%"><a href="petinfo.php">Atpakaļ</a></button>
                                </form>
                                ';
                        }
                    }
                }
            }
      ?>
</div>
<?php
    include_once 'footer.php'
?>