<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm">
    <br><br><br>
    <h1>Personāla autorizācija</h1>
    <br>
    <form action="templates/login.inc.php" method="POST">
        <h6>E-pasts</h6>
        <input type="text" name="Emailuid" class="form-control form-control-sm" style="width: 20%; margin-left: 40%;"><br>
        <h6>Parole</h6>
        <input type="password" name="Epwd" class="form-control form-control-sm" style="width: 20%; margin-left: 40%"><br><br>
        <button type="submit" name="Elogin-submit" class="btn btn-dark">Pieslēgties</button><br><br>
    </form>
</div>
<?php
    include_once 'footer.php'
?>