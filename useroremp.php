<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm">
<br><br><br>
<h3>Vai jūs vēlaties pieslēgties kā lietotājs vai kā darbinieks ?</h3><br><Br>
<button type="submit" name="login-submit" class="btn btn-dark" id="Login">Pieslēgties kā lietotājs</button>
<script type="text/javascript">
    document.getElementById("Login").onclick = function () {
        location.href = "login.php";
    };
</script>
<button type="submit" name="login-submit" class="btn btn-dark" id="ELogin">Pieslēgties kā darbinieks</button>
<script type="text/javascript">
    document.getElementById("ELogin").onclick = function () {
        location.href = "EmpLogin.php";
    };
</script>
<?php
    include_once 'footer.php'
?>