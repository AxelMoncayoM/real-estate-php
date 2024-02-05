<?php 
    //base de datos
    require("../../includes/config/database.php");
    $db = conectar_db();

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errorres = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedores_id = '';

    //var_dump($db);

    //Ejecuta el codigo despues de que el usuario presiona enviar en el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        /* echo '<pre>';
        var_dump($_POST);
        echo '</pre>'; */

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedores_id = $_POST['vendedor'];
        $creado = date('Y/m/d');


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

        //Revisando que el arreglo de errores este vacio
        if(empty($errores)){

            //Insertar en la base de datos
            $query = " INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id') ";
    
            //echo $query;
    
            $resultado = mysqli_query($db, $query);
    
            if($resultado){
                //redireccionar al usuario
                header("Location: /real-estate-php/admin/index.php");//Esto solo funciona si no hay HTML previo
            }
        }

        
    }


    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Crear</h1>

        <a href="/real-estate-php/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form action="" class="formulario" method="POST" action="/real-estate-php/admin/propiedades/crear.php">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo de propiedad" value="<?= "$titulo" ?>">

                <label for="precio">Precio: </label>
                <input type="number" id="precio" name="precio" placeholder="Precio de propiedad" value="<?= "$precio" ?>">
                
                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" >

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

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>


    </main>

    <?php incluirTemplate("footer"); ?>

