<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);

      $sql1 = "SELECT * FROM Pet";
      $result1 = $conn->query($sql1);
      
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
                                <form method="POST" action="pet-edit.php">
                                    <div class="card w-10 mb-4" style="text-alignt:center;">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$row1['Pet_name'].'</h5>
                                            <p class="card-text">'.$row1['Pet_breed'].'</p>
                                            <p class="card-text">'.$row1['Pet_type'].'</p>
                                            <input type="hidden" value="'.$row1['Pet_id'].'" name="petinfoid"></input>
                                            <a href="pet-edit.php?editid='.$row1['Pet_id'].'" type="submit" class="btn btn-primary btn-success" style="margin-right:1%" name="editpet">labot</a><a href="templates/pet-delete.inc.php?deleteid='.$row1['Pet_id'].'" class="btn btn-primary btn-danger" style="margin-left:1%">dzēst</a>
                                        </div>
                                    </div>
                                </form>
                                ';
                                }
                            }
                          }
                    }

            echo '<button class="btn btn-light" style="margin-right:1%; margin-bottom:2%; margin-top:2%"><a href="profile.php">Atpakaļ</a></button>';
      ?>
</div>
<?php
    include_once 'footer.php'
?>