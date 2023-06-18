<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Employee";
      $result = $conn->query($sql);

      $sql1 = "SELECT * FROM Listing";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0){
        $row1 = $result1->fetch_assoc();
      }

      $sql2 = "SELECT * FROM Pet";
      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0){
        $row2 = $result2->fetch_assoc();
      }

?>
<br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
<br>
    <h3 style="text-align: center; color:white; margin-top: 1%;">Pieejamie darbi</h3><br>
    <?php       
                      if (isset($_SESSION['EmployeeId'])){
                        if ($result1->num_rows > 0) {
                          while($row1 = $result1->fetch_assoc()) {
                            while($row2 = $result2->fetch_assoc()){
                                echo '
                                <form method="POST" action="job-active.inc.php">
                                <div class="card w-10 mb-4" style="text-alignt:center;">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row2['Pet_name'].'</h5>
                                    <p class="card-text">'.$row1['Animal_description'].'</p>
                                    <p class="card-text">'.$row1['Requirements'].'</p>
                                    <input type="hidden" name="listingid" value="'.$row1['Listing_id'].'"></input>
                                    <a href="#" class="btn btn-primary btn-success" style="margin-right:1%" name="job-accept">Apstirpināt</a>
                                </div>
                                </div>
                                </form>
                                ';
                                }
                            }
                          }
                        }
      ?>
      <br>
</div>
<?php
    include_once 'footer.php'
?>