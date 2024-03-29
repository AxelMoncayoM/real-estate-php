<?php 

  require 'includes/funciones.php';
  incluirTemplate('header', true);

?>

    <main class="contenedor seccion">
      <h1>Más Sobre Nosotros</h1>

      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono Seguridad"
            loading="lazy"
          />
          <h3>Seguridad</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam
            placeat cumque obcaecati, sit explicabo modi nam doloremque. Harum,
            similique nisi alias laborum at perspiciatis fugiat voluptatibus
            nobis quis ea debitis?
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />
          <h3>Precio</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam
            placeat cumque obcaecati, sit explicabo modi nam doloremque. Harum,
            similique nisi alias laborum at perspiciatis fugiat voluptatibus
            nobis quis ea debitis?
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" />
          <h3>A Tiempo</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam
            placeat cumque obcaecati, sit explicabo modi nam doloremque. Harum,
            similique nisi alias laborum at perspiciatis fugiat voluptatibus
            nobis quis ea debitis?
          </p>
        </div>
      </div>
    </main>

    <section class="seccion contenedor">
      <h2>Casa y Depas en Venta</h2>

      
      <?php 
        $limite = 3;
        include("includes/templates/anuncios.php"); 
      ?>

      <div class="ver-todas">
        <a class="boton-verde" href="anuncios.php">Ver Todas</a>
      </div>
    </section>

    <section class="imagen-contacto">
      <h2>Encuentra la casa de tus sueños</h2>
      <p>Llena el formulario y te contactaremos a la brevedad</p>
      <a class="boton-naranja-inline" href="contacto.html">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
      <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
          <div class="imagen">
            <img src="build/img/blog1.jpg" alt="entrada blog" loading="lazy" />
          </div>

          <div class="texto-entrada">
            <a href="entrada.html">
              <h4>Terraza en el techo</h4>
              <p>Escrito el: <span>**/**/20**</span> por: <span>Admin</span></p>
              <p>Consejos para tener una terraza en tu casa</p>
            </a>
          </div>
        </article>

        <article class="entrada-blog">
          <div class="imagen">
            <img src="build/img/blog2.jpg" alt="entrada blog" loading="lazy" />
          </div>

          <div class="texto-entrada">
            <a href="entrada.html">
              <h4>Guía de decoración de tu hogar</h4>
              <p>Escrito el: <span>**/**/20**</span> por: <span>Admin</span></p>
              <p>
                Aprende a combinar muebles y colores para darle más vida a tu
                hogar
              </p>
            </a>
          </div>
        </article>
      </section>

      <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
          <blockquote>
            El personale se comporto excelente, hubo una gran atención por parte
            de ellos y la casa supero nuestras expectativas.
          </blockquote>

          <p>Axel Moncayo</p>
        </div>
      </section>
    </div>

    <?php incluirTemplate("footer"); ?>

