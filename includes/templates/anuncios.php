<?php 
    //importar la base de datos
    require("includes/config/database.php");
    $db = conectar_db();


    //consultar
    $query = "SELECT * FROM propiedades LIMIT $limite";


    // obtener resultados
    $resultado = mysqli_query($db, $query);

?>



      <div class="contenedor-anuncios">
        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>

        <div class="anuncio">
          <img
            src="imagenes/<?php echo "$propiedad[imagen]" . ".jpg"?>"
            alt="imagen anuncio"
            loading="lazy"
          />
          <div class="contenido-anuncio">
            <h3><?= "$propiedad[titulo]" ?></h3>
            <p><?= "$propiedad[descripcion]" ?></p>
            <p class="precio">$<?= "$propiedad[precio]" ?></p>

            <ul class="iconos-caracteristicas">
              <li>
                <img
                  src="build/img/icono_wc.svg"
                  alt="icono wc"
                  loading="lazy"
                />
                <p><?= "$propiedad[wc]" ?></p>
              </li>

              <li>
                <img
                  src="build/img/icono_estacionamiento.svg"
                  alt="icono estacionamiento"
                  loading="lazy"
                />
                <p><?= "$propiedad[estacionamiento]" ?></p>
              </li>

              <li>
                <img
                  src="build/img/icono_dormitorio.svg"
                  alt="icono dormitorio"
                  loading="lazy"
                />
                <p><?= "$propiedad[habitaciones]" ?></p>
              </li>
            </ul>

            <a class="boton-naranja" href="anuncio.php?id=<?= "$propiedad[id]" ?>">Ver Propiedad</a>
          </div>
        </div>

        <?php endwhile; ?>
      </div>

<?php 
    //cerrrar la conexión
    mysqli_close($db);
?>