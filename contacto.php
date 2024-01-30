<?php 
  include './includes/templates/header.php';
?>

    <main class="contenedor seccion">
      <h1>Contacto</h1>

      <img src="build/img/destacada3.jpg" alt="imagen contacto loading="lazy">

      <h2>Llene el formulario de contacto</h2>

      <form class="formulario" action="">
        <fieldset>
          <legend>Información Personal</legend>

          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" placeholder="Tu nombre" />

          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Tu correo" />

          <label for="telefono">Teléfono</label>
          <input type="tel" id="telefono" placeholder="Tu telefono" />

          <label for="mensaje">Mensaje</label>
          <textarea id="mensaje"></textarea>
        </fieldset>

        <fieldset>
          <legend>Información Sobre la Propiedad</legend>

          <label for="opciones">Vende o Compra:</label>
          <select id="opciones">
            <option value="" disabled selected>--Seleccione--</option>
            <option value="Compra">Compra</option>
            <option value="Vende">Vende</option>
          </select>

          <label for="presupuesto">Precio o Presupuesto</label>
          <input type="number" id="presupuesto" placeholder="Tu presupuesto" />
        </fieldset>

        <fieldset>
          <legend>Contacto</legend>

          <p>Cómo desea ser contactado</p>

          <div class="forma-contacto">
            <label for="contactar-telefono">Teléfono</label>
            <input
              type="radio"
              value="telefono"
              id="contactar-telefono"
              name="contacto"
            />

            <label for="contactar-correo">Correo</label>
            <input
              type="radio"
              value="correo"
              id="contactar-correo"
              name="contacto"
            />
          </div>

          <p>
            Si elegió teléfono, elija la fecha y la hora para ser contactado
          </p>

          <label for="fecha">Fecha:</label>
          <input type="date" id="fecha" />

          <label for="hora">Hora:</label>
          <input type="time" id="hora" min="09:00" max="18:00" />
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde" />
      </form>
    </main>

    <?php include './includes/templates/footer.php' ?>

