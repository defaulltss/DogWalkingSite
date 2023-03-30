<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm">
<br><br><br>
<h1>Reģistrācija</h1>
<br>
    <form action="templates/signup.inc.php" method="POST">
        <h6>Vards</h6>
        <input type="text" name="firstname" class="form-control form-control-sm" style="width: 20%; margin-left: 40%"><br>
        <h6>Uzvards</h6>
        <input type="text" name="lastname" class="form-control form-control-sm" style="width: 20%;margin-left: 40%"><br>
        <h6>E-pasts</h6>
        <input type="text" name="uid" class="form-control form-control-sm" style="width: 20%;margin-left: 40%"><br>
        <h6>Parole</h6>
        <input type="password" name="pwd" class="form-control form-control-sm" style="width: 20%;margin-left: 40%"><br>
        <h6>Atkartot paroli</h6>
        <input type="password" name="pwd-1" class="form-control form-control-sm" style="width: 20%;margin-left: 40%"><br>
        <h6>Tālruņa nummurs</h6>
        <input type="phone" name="phone" class="form-control form-control-sm" style="width: 20%;margin-left: 40%"><br>
        <button type="submit" class="btn btn-dark" name="signup-submit">Reģistrēties</button>
    </form>
</div>

<?php
    include_once 'footer.php'
?>