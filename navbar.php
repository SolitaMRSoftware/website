<nav class="navbar navbar-expand-lg navbar-dark " style="background: #232526;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #414345, #232526);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #414345, #232526); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="assets/multimedia/images/perfil1.png" width="80"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="nosotros.php">¿Quiénes Somos?</a>
        </li>
        
        <?php
        if (isset($_SESSION['usuario'])) {
            echo '
            <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink role="button" data-bs-toggle="dropdown" aria-expanded="false">'
              .$_SESSION['usuario'].'
            </a>
            <ul class="dropdown-menu" 
            aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" 
              href="tracks.php">Tracks</a></li>
              <li><a class="dropdown-item" 
              href="perfil.php">Perfil</a></li>
              <li><a class="dropdown-item" 
                href="index.php?cerrarSesion="si">Cerrar Sesion</a></li>

              </ul>
            </li>
            ';
            if ($_SESSION['tipo']=="admin") {
                echo '
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" 
                    href="paneldecontrol.php">Panel de Control</a>
                </li>
                 ';
            }
          }else{
              echo '
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" 
                  href="login.php">Cuenta</a>
              </li>
                ';
            }
            ?>
      </ul>
    </div>
  </div>
</nav>
