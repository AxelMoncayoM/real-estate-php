<?php 
   require 'includes/funciones.php';
   incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Nuestro Blog</h1>

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

      <article class="entrada-blog">
        <div class="imagen">
          <img src="build/img/blog3.jpg" alt="entrada blog" loading="lazy" />
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
          <img src="build/img/blog4.jpg" alt="entrada blog" loading="lazy" />
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
    </main>

    <?php incluirTemplate("footer"); ?>
