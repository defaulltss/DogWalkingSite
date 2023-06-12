<?php
    include_once 'header.php'
?>
<br><br><br>
<div class="container-sm col-lg-4 bg-dark" style="border-radius:25px; height: 60%;">
  <form action="templates/post.inc.php" method="POST"><br>
        <h6 style="color:white">Vārds uz ko dzīvnieks atsaucas</h6>
        <input type="text" name="name" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Dzīvnieka šķirna</h6>
        <input type="text" name="breed" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"><br>
        <h6 style="color:white">Mazs apraksts par dzīvnieku</h6>
        <textarea placeholder="Jauks, mīļš un draudzīgs četrkājains sunīts " type="text" name="about" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"></textarea><br>
        <h6 style="color:white">Prasības (cik ilgi staigāt vai ko darīt)</h6>
        <textarea type="password" placeholder="Vēlams būtu pastaigāt 20-25min te pat pa parku" name="req" class="form-control form-control-sm" style="width: 50%; margin-left: 25%"></textarea><br>
        <button type="submit" class="btn btn-light" name="post-made">Publicēt</button>
  </form>
</div>
<?php
    include_once 'footer.php'
?>
