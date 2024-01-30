<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes-Raices</title>

    <link rel="stylesheet" href="/real-estate-php/build/css/app.css" />
  </head>
  <body>
    <header class="header <?php echo isset($inicio) ? 'inicio ' : ''; ?>">
      <div class="contenedor contenido-header">
        <div class="barra">
          <a href="./index.php">
            <img src="build/img/logo.svg" alt="logo de bienes raices" />
          </a>

          <div class="nav-mobile">
            <img src="build/img/barras.svg" alt="icono menu" />
          </div>

          <div class="derecha">
            <img
              class="dark-mode-boton"
              src="build/img/dark-mode.svg"
              alt="icono
            dark-mode"
            />
            <nav class="navegacion">
                <a href="anuncios.php">Anuncios</a>
                <a href="nosotros.php">Nosotros</a>
              <a href="blog.php">Blog</a>
              <a href="contacto.php">Contacto</a>
            </nav>
          </div>

          <!--barra-->
        </div>

        <?php if($inicio){ ?>
            <h1>Venta de casas y departamentos de lujo</h1>
        <?php } ?>
      </div>
    </header>