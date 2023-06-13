<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px;">
  <form action="templates/listing.inc.php" method="POST"><br>
        <h6 style="color:white">Tēma :</h6>
        <input type="text" name="subject" placeholder="Kā sunim iemācīt trikus " class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Jūsu raksts :</h6>
        <textarea type="text" name="about-subject" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"></textarea><br>
        <button type="submit" class="btn btn-light" name="listing-made">Publicēt ierakstu</button>
        <br><br>
  </form>
</div>
<?php
    include_once 'footer.php'
?>