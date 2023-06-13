<?php
    include_once 'header.php'
?>
<?php
    include_once 'footer.php'
?>
<?php 

    require 'templates/dbh.inc.php';

    $sql = "SELECT * FROM Post";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql1 = "SELECT * FROM Users";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    while($row1 = $result1->fetch_assoc()){
    if ($_SESSION['userId'] == $row1['Users_id']){
            $name = $row1['Users_firstname'];
    }
}
?>
<br><br><br>
<div class="container-sm col-lg-10 bg-light" style="border-radius:25px; border-color: #000;; height: 85%">
    <h2>Zemāk redzamie ieraksti ir jūsu veikti : </h2>
        <div class="container-sm col-lg-8 bg-light" style="border-radius:25px;">
            <?php
            echo '
            <table>
                <tr>
                    <td>Lietotāja vārds :</td>
                    <td>Ieraksta tēma :</td>
                    <td>Ieraksts :</td>
                </tr>
                    ';
                    while($row = $result->fetch_assoc()){
                        if ($_SESSION['userId'] == $row['User_id']){
                        echo'
                        <tr>
                            <td>'.$name.'</td>
                            <td>'.$row['Post_subject'].'</td>
                            <td>'.$row['Post_text'].'</td>
                        </tr> 
                        ';
                    ' 
            </table>
                ';
                }   
            }
        ?>
    </div>
</div>