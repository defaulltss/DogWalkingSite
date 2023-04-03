<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px; height: 75%">
<br><br><br>
<h1 style="color:white">Reģistrācija</h1>
<br>
    <form action="templates/signup.inc.php" method="POST">
        <h6 style="color:white">Vards</h6>
        <input type="text" name="firstname" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Uzvards</h6>
        <input type="text" name="lastname" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">E-pasts</h6>
        <input placeholder="example@gmail.com" type="text" name="uid" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Parole</h6>
        <input type="password" name="pwd" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Atkartot paroli</h6>
        <input type="password" name="pwd-1" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Tālruņa nummurs</h6>
        <input type="phone" name="phone" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br><br>
        <button type="submit" class="btn btn-light" name="signup-submit">Reģistrēties</button>
    </form>
</div>

<?php
    include_once 'footer.php'
?>