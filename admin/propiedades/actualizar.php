
<?php 

  //Validando el id
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id){
    header("Location: /real-estate-php/admin/index.php");
  }

    //base de datos
    require("../../includes/config/database.php");
    $db = conectar_db();

    //Obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    /* echo "<pre>";
    var_dump($propiedad);
    echo "</pre>"; */

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errorres = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedores_id = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

    //var_dump($db);

    //Ejecuta el codigo despues de que el usuario presiona enviar en el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       /*  echo '<pre>';
        var_dump($_POST);
        echo '</pre>'; 
        
        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>'; 

        exit; */

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio){
            $errores[] = "Debes añadir un precio";
        }

        if(strlen($descripcion) < 50){
            $errores[] = "Debes añadir una descripción y debe tener minimo 50 caracteres";
        }

        if(!$habitaciones){
            $errores[] = "Debes añadir un número de habitaciones";
        }

        if(!$wc){
            $errores[] = "Debes añadir un número de baños";
        }

        if(!$estacionamiento){
            $errores[] = "Debes añadir un número de estacionamientos";
        }

        if(!$vendedores_id){
            $errores[] = "Debes seleccionar un vendedor";
        }

        if(!$imagen['name'] || $imagen['error']){
            $errores[] = "La imagen es obligatoria";
        }

        //Validar tamaño
        $medida = 1000 * 1000;

        if($imagen['size'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }

        //Revisando que el arreglo de errores este vacio
        if(empty($errores)){

            /*Subida de archivos*/
            
            //Creando una carpeta
            $carpetaImagenes = "../../imagenes";

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes); 
            }

            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(), true));

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen . ".jpg");


            //Insertar en la base de datos
            $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id') ";
    
            //echo $query;
    
            $resultado = mysqli_query($db, $query);
    
            if($resultado){
                //redireccionar al usuario
                header("Location: /real-estate-php/admin/index.php?resultado=1");//Esto solo funciona si no hay HTML previo
            }
        }

        
    }


    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Actualizar Propiedad</h1>

        <a href="/real-estate-php/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/real-estate-php/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo de propiedad" value="<?= "$titulo" ?>">

                <label for="precio">Precio: </label>
                <input type="number" id="precio" name="precio" placeholder="Precio de propiedad" value="<?= "$precio" ?>">
                
                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg" name="imagen">

                <img class="imagen-sm" src="/real-estate-php/imagenes/<?php echo $imagenPropiedad . ".jpg";?>">

                <label for="descripcion">Descripcion: </label>
                <textarea id="descripcion" name="descripcion"><?= "$descripcion" ?></textarea>

            </fieldset>

             <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones: </label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Número de habitaciones" min="1" max="9" value="<?= "$habitaciones" ?>">

                <label for="wc">Baños: </label>
                <input type="number" id="wc" name="wc" placeholder="Número de baños" min="1" max="9" value="<?= "$wc" ?>">

                <label for="estacionamiento">Estacionamieto: </label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Número de estacionamientos" min="1" max="9" value="<?= "$estacionamiento" ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">--Seleccione--</option>
                    <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                        <option <?=$vendedores_id === $row['id'] ? 'selected' : ''?>  value="<?="$row[id]"?>"><?="$row[nombre] $row[apellido]";?></option>
                    <?php endwhile; ?>
                </select>

            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>


    </main>

    <?php incluirTemplate("footer"); ?>

