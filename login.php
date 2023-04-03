<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px; height:50%">
    <br><br><br>
    <h1 style="color:white">Autorizācija</h1>
    <br>
    <form action="templates/login.inc.php" method="POST">
        <h6 style="color:white">E-pasts</h6>
        <input placeholder="example@gmail.com" type="text" name="mailuid" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Parole</h6>
        <input type="password" name="pwd" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br><br>
        <button type="submit" name="login-submit" class="btn btn-light">Pieslēgties</button><br><br>
        <a style="color:white">Nēesi reģistrējies mūsu vietnē ?</a><br>
        <a href="wewe.php" style="color:white">Reģistrēties</a>
    </form>
</div>
<?php
    include_once 'footer.php'
?>
