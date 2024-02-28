<?php 
    require '../includes/funciones.php';

    $auth = estaAutenticado();

    if(!$auth){
        header("Location: /real-estate-php/index.php");
    }
/*   if(!$auth){
    header("Location: /real-estate-php/index.php");
  } */
  //importar la conexión
  require("../includes/config/database.php");
  $db = conectar_db();



  //Escribir query
  $query = "SELECT * FROM propiedades";

  //Consultar base de datos
  $resultadoConsulta = mysqli_query($db, $query);



  $resultado = $_GET['resultado'] ?? null;

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){

      //Eliminar el archivo
      $query = "SELECT imagen FROM propiedades WHERE id = $id";

      $resultado = mysqli_query($db, $query);
      $propiedad = mysqli_fetch_assoc($resultado);
      unlink("../imagenes/" . $propiedad['imagen'] . ".jpg");

      //Eliminar la propiedad
      $query = "DELETE FROM propiedades WHERE id = $id";
      
      $resultado = mysqli_query($db, $query);

      if($resultado){
        header("Location: /real-estate-php/admin/index.php?resultado=3");

      }
    }

    //var_dump($id);
  }

   incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Administrador de Real Estate</h1>

      <?php if(intval($resultado) === 1): ?>
        <p class="alerta exito">Creado Correctamente</p>
      <?php elseif(intval($resultado) === 2): ?>
        <p class="alerta exito">Actualizado Correctamente</p>
      <?php elseif(intval($resultado) === 3): ?>
        <p class="alerta exito">Eliminado Correctamente</p>
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
              <form method="POST" class="w-100">
                <input type="hidden" name="id" value="<?="$propiedad[id]";?>">
                <input type="submit" class="boton-rojo-block" value="Eliminar"></input>
              </form>
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

