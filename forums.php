<?php
    include_once 'header.php'
?>

<?php 

    require 'templates/dbh.inc.php';

    $sql = "SELECT * FROM Post";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql1 = "SELECT * FROM Users";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    if (isset($_SESSION['userId'])){
        if ($result1->num_rows >= 0) {
            while($row1 = $result1->fetch_assoc()) {
            if ($row1['Users_id'] == $_SESSION['userId']){
                $name = $row1['Users_firstname'];
            }}}}
?>
<br>
<div class="container-sm col-lg-10 bg-light" style="border-radius:25px; border-color: #000;; height: 85%">
    <h2>Citu cilvēku veiktie ieraksti</h1>
    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo '
            <div class="card">
            <div class="card-header">
              <h3>'.$row['Post_subject'].'</h3>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                '.$row['Post_text'].'<br><br>
                <footer class="blockquote-footer">'.$name.'</footer>
                </footer>
              </blockquote>
            </div>
          </div>
          <br>
                ';
            }
        }
    ?>
    </div>
</div>
<?php
    include_once 'footer.php'
?>