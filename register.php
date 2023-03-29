<?php
    include_once 'header.php'
?>
<div class="body">
<br><br><br>
<h1>Reģistrācija</h1>
<br>
    <form action="templates/signup.inc.php" method="POST">
        <h6>Vards</h6>
        <input type="text" name="firstname" class="input"><br>
        <h6>Uzvards</h6>
        <input type="text" name="lastname" class="input"><br>
        <h6>E-pasts</h6>
        <input type="text" name="uid" class="input"><br>
        <h6>Parole</h6>
        <input type="password" name="pwd" class="input"><br>
        <h6>Atkartot paroli</h6>
        <input type="password" name="pwd-1" class="input"><br><br>
        <h6>Tālruņa nummurs</h6>
        <input type="phone" name="phone" class="input"><br><br>
        <button type="submit" name="signup-submit">Reģistrēties</button>
    </form>
</div>

<?php
    include_once 'footer.php'
?>