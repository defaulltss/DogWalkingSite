<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm">
    <br><br><br>
    <h1>Autorizācija</h1>
    <br>
    <form action="templates/login.inc.php" method="POST">
        <h6>E-pasts</h6>
        <input type="text" name="mailuid" class="form-control form-control-sm" style="width: 20%; margin-left: 40%;"><br>
        <h6>Parole</h6>
        <input type="password" name="pwd" class="form-control form-control-sm" style="width: 20%; margin-left: 40%"><br><br>
        <button type="submit" name="login-submit" class="btn btn-dark">Pieslēgties</button><br><br>
        <a>Nēesi reģistrējies mūsu vietnē ?</a><br>
        <a href="register.php">Reģistrēties</a>
    </form>
</div>
<?php
    include_once 'footer.php'
?>
