<?php 
   require '../../includes/funciones.php';
   incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Crear</h1>

        <a href="/real-estate-php/admin/index.php" class="boton boton-verde">Volver</a>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" placeholder="Titulo de propiedad">

                <label for="precio">Precio: </label>
                <input type="number" id="precio" placeholder="Precio de propiedad">
                
                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion: </label>
                <textarea id="descripcion"></textarea>

            </fieldset>

             <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones: </label>
                <input type="number" id="habitaciones" placeholder="Número de habitaciones" min="1" max="9">

                <label for="wc">Baños: </label>
                <input type="number" id="wc" placeholder="Número de baños">

                <label for="estacionamiento">Estacionamieto: </label>
                <input type="number" id="estacionamiento" placeholder="Número de estacionamientos">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select>
                    <option value="1">Axel</option>
                    <option value="2">Sam</option>
                    <option value="3">Ramses</option>
                </select>

            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>


    </main>

    <?php incluirTemplate("footer"); ?>

