<?php 

  //importar la conexión
  require("../includes/config/database.php");
  $db = conectar_db();



  //Escribir query
  $query = "SELECT * FROM propiedades";

  //Consultar base de datos
  $resultadoConsulta = mysqli_query($db, $query);



  $resultado = $_GET['resultado'] ?? null;

   require '../includes/funciones.php';
   incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Administrador de Real Estate</h1>

      <?php if(intval($resultado) === 1): ?>
        <p class="alerta exito">Creado Correctamente</p>
      <?php elseif(intval($resultado) === 2): ?>
        <p class="alerta exito">Actualizado Correctamente</p>
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

        <tbody> <!--Mostrar los resultados-->
        <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>

          <tr>
            <td><?= "$propiedad[id]" ?></td>
            <td><?= "$propiedad[titulo]" ?></td>
            <td><img src="/real-estate-php/imagenes/<?php echo $propiedad['imagen'] . ".jpg";?>" class="imagen-tabla"></td>
            <td><?= "$" . "$propiedad[precio]" ?></td>
            <td>
              <a href="#" class="boton-rojo-block">Eliminar</a>
              <a href="/real-estate-php/admin/propiedades/actualizar.php?id=<?="$propiedad[id]"?>" class="boton-verde-block">Actualizar</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </main>


    <?php 
    
    //Cerrar la conexión
    mysqli_close($db);
    
    
      incluirTemplate("footer"); ?>

