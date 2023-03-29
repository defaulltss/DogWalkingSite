<?php
    include_once 'header.php'
?>
<div class="body">
<br><br><br>
<h1>Šeit jūs varat reģistrēties lai kļūtu par darbinieku</h1>
<br>
    <form action="templates/signup.inc.php" method="POST">
        <h6>Vards</h6>
        <input type="text" name="Efirstname" class="input"><br>
        <h6>Uzvards</h6>
        <input type="text" name="Elastname" class="input"><br>
        <h6>E-pasts</h6>
        <input type="text" name="Euid" class="input"><br>
        <h6>Parole</h6>
        <input type="password" name="Epwd" class="input"><br>
        <h6>Atkartot paroli</h6>
        <input type="password" name="Epwd-1" class="input"><br><br>
        <h6>Tālruņa nummurs</h6>
        <input type="phone" name="Ephone" class="input"><br><br>
        <h6>Dzimšanas datums</h6>
        <input type="date" name="date" class="input"><br><br>
        <button type="submit" name="Esignup-submit">Reģistrēties</button>
    </form>
</div>

<?php
    include_once 'footer.php'
?>