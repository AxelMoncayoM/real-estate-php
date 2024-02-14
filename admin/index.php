<?php 

  $resultado = $_GET['resultado'] ?? null;

   require '../includes/funciones.php';
   incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Administrador de Real Estate</h1>

      <?php if(intval($resultado) === 1): ?>
        <p class="alerta exito">Creado Correctamente</p>
      <?php endif; ?>

      <a href="/real-estate-php/admin/propiedades/crear.php" class="boton boton-verde">Crear Propiedad</a>
    </main>


    <?php incluirTemplate("footer"); ?>

