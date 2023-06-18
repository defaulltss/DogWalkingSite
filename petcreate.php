<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
<br><br>
<h1 style="color:white">Ievadiet informāciju par jūsu mājdzīvnieku</h1>
<br>
    <form action="templates/pet.inc.php" method="POST">
        <h6 style="color:white">Vārds uz ko dzīvnieks atsaucas</h6>
        <input placeholder="Reksis" type="text" name="petname" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Mājdzīvnieka tips</h6>
        <input placeholder="Suns" type="text" name="pettype" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Mājdzīvnieka šķirna</h6>
        <input placeholder="Franču buldogs" type="text" name="petbreed" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <button type="submit" class="btn btn-light" name="pet-create">Pievienot</button><br><br>
    </form>
</div>

<?php
    include_once 'footer.php'
?>