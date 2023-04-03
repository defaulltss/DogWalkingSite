<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px; height:30%;" >
<br><br><br>
<h3 style="color:white">Vai jūs vēlaties pieslēgties kā lietotājs vai kā darbinieks ?</h3><br><Br>
<button type="submit" name="login-submit" class="btn btn-light" id="Login">Pieslēgties kā lietotājs</button>
<script type="text/javascript">
    document.getElementById("Login").onclick = function () {
        location.href = "login.php";
    };
</script>
<button type="submit" name="login-submit" class="btn btn-light" id="ELogin">Pieslēgties kā darbinieks</button>
<script type="text/javascript">
    document.getElementById("ELogin").onclick = function () {
        location.href = "EmpLogin.php";
    };
</script>
<?php
    include_once 'footer.php'
?>