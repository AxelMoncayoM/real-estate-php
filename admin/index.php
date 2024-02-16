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

      <table class="propiedades">
        <thead>
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>Casa en la playa</td>
            <td><img src="/real-estate-php/imagenes/310e3ebb783b41b5835f25445dc0a1bb.jpg" class="imagen-tabla"></td>
            <td>Precio</td>
            <td>
              <a href="#" class="boton-rojo-block">Eliminar</a>
              <a href="#" class="boton-verde-block">Actualizar</a>
            </td>
          </tr>
        </tbody>
      </table>
    </main>


    <?php incluirTemplate("footer"); ?>

