<style>
<?php include "static/clean.css";?>
</style>
<?php
   session_start(); 
?>
<!DOCTYPE html>
<html class="html">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Četras Ķepas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Izvēlne</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php" style="font-size:xx-large">Sākums</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="useroremp.php" style="font-size:xx-large">Pieslēgties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php" style="font-size:xx-large">Reģistrācija</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.php" style="font-size:xx-large">Veikt ierakstu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="EmpRegister.php" style="font-size:xx-large">Darbinieka reģistrācija</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="templates/logout.inc.php" style="font-size:xx-large">Atslēgties</a>
          </li>
        </ul>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
<main>