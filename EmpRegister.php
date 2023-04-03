<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px">
<br><br><br>
<h4 style="color:white">Šeit jūs varat reģistrēties lai kļūtu par darbinieku</h4>
<br>
    <form action="templates/signup.inc.php" method="POST">
        <h6 style="color:white">Vards</h6>
        <input type="text" name="Efirstname" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Uzvards</h6>
        <input type="text" name="Elastname" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">E-pasts</h6>
        <input type="text" name="Euid" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Parole</h6>
        <input type="password" name="Epwd" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Atkartot paroli</h6>
        <input type="password" name="Epwd-1" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Tālruņa nummurs</h6>
        <input type="phone" name="Ephone" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Dzimšanas datums</h6>
        <input type="date" name="date" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br><br>
        <button type="submit" class="btn btn-light" name="Esignup-submit">Reģistrēties</button>
    </form>
</div>

<?php
    include_once 'footer.php'
?>