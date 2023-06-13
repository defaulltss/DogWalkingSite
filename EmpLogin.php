<?php
    include_once 'header.php'
?>
<?php
        if (isset($_SESSION['Emp-Login-empty-fields'])){ 
            ?>
                <div class="alert alert-warning" role="alert" style="text-align: center;">
                <div>
                    <strong>HEY!!</strong> <?php echo $_SESSION['Emp-Login-empty-fields']; ?>
                </div>
                </div>
            <?php
            unset($_SESSION['Emp-Login-empty-fields']);
        }
        if (isset($_SESSION['Emp-Login-sql-error'])){ 
            ?>
                <div class="alert alert-warning" role="alert" style="text-align: center;">
                <div>
                    <strong>Uh oh !</strong> <?php echo $_SESSION['Emp-Login-sql-error']; ?>
                </div>
                </div>
            <?php
            unset($_SESSION['Emp-Login-sql-error']);
        }
        if (isset($_SESSION['Emp-Login-pwd-wrong'])){ 
            ?>
                <div class="alert alert-warning" role="alert" style="text-align: center;">
                <div>
                    <strong>OOPS!</strong> <?php echo $_SESSION['Emp-Login-pwd-wrong']; ?>
                </div>
                </div>
            <?php
            unset($_SESSION['Emp-Login-pwd-wrong']);
        }
        if (isset($_SESSION['Emp-Login-no-user'])){ 
            ?>
                <div class="alert alert-warning" role="alert" style="text-align: center;">
                <div>
                    <strong>Hmm </strong> <?php echo $_SESSION['Emp-Login-no-user']; ?>
                </div>
                </div>
            <?php
            unset($_SESSION['Emp-Login-no-user']);
        }
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
    <br><br><br>
    <h4 style="color:white">Personāla autorizācija</h4>
    <br>
    <form action="templates/login.inc.php" method="POST">
        <h6 style="color:white">E-pasts</h6>
        <input placeholder="example@gmail.com" type="text" name="Emailuid" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Parole</h6>
        <input type="password" name="Epwd" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br><br>
        <button type="submit" name="Emp-login-submit" class="btn btn-light">Pieslēgties</button><br><br>
        <br><br>
    </form>
</div>
<?php
    include_once 'footer.php'
?>