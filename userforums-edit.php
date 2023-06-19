<?php
    include_once 'header.php'
?>
<?php 
      require 'templates/dbh.inc.php';

      $sql = "SELECT * FROM Users";
      $result = $conn->query($sql);

      $sql1 = "SELECT * FROM Post";
      $result1 = $conn->query($sql1);

      $id = $_GET['forumseditid'];
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
<?php
    if (isset($_SESSION['userId'])){
        if ($result1->num_rows > 0) {
            while($row1 = $result1->fetch_assoc()) {
                if ($row1['Post_id'] == $id){
                    echo '
                    <form action="templates/forums-edit.inc.php?forumsid='.$row1['Post_id'].'" method="POST"><br>
                            <h6 style="color:white">Tēma :</h6>
                            <input type="text" name="editsubject" value="'.$row1['Post_subject'].'" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
                            <h6 style="color:white">Jūsu raksts :</h6>
                            <textarea type="text" name="edit-about-subject" class="form-control form-control-sm" style="width: 50%; margin-left: 25%">'.$row1['Post_text'].'</textarea><br>
                            <button type="submit" class="btn btn-success" name="userforums-edit">Saglabāt</button>
                            <br><button class="btn btn-light" style="margin-right:1%; margin-bottom:2%; margin-top:2%"><a href="userforums.php">Atpakaļ</a></button>
                            <br><br>
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