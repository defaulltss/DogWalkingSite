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

?>
<br><br><br>
<div class="container-sm col-lg-10 bg-light" style="border-radius:25px; border-color: #000;; height: 85%">
    <h2>Zemāk redzamie ieraksti ir jūsu veikti : </h2>
    <div class="container-sm col-lg-8 bg-dark" style="border-radius:25px;">
    <?php
    while($row = $result->fetch_assoc()){
        echo '<a style="color:white">Autors    : '.$row1['Users_firstname'].'</a>'.'<br>';
        echo '<a style="color:white">Tēma      : '.$row['Post_subject'].'</a>'.'<br>';
        echo '<a style="color:white">Teksts    : '.$row['Post_text'].'</a>' .'<br>';
        echo '<br><br>';
    }

    ?>
    </div>
</div>
<?php
    include_once 'footer.php'
?>
