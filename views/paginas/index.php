<main class="contenedor">
        <h2 class="subtitulo">Más Sobre Nosotros</h2>
        <?php 
            include 'iconos.php' 
        ?>
    </main> <!-- MAIN -->

    <section class="contenedor seccion">
        <h2 class="subtitulo">Casas y Depas en Venta</h2>

        <?php
            include 'listado.php';
        ?>
        
        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section> <!-- SECCION -->

    <section class="imagen-contactanos"> 
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="contenedor-blog">
            <h2 class="subtitulo">Nuestro blog</h2>
                <article class="entrada-blog sombra">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Imagen Blog" loading="lazy">
                    </picture>
                    <div class="texto-entrada">
                        <a href="/entrada">
                            <h3>Terraza en el techo de tu casa</h3>
                            <p>Escrito el: <span>13/4/2023</span> por: <span>Admin</span></p>
                            <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                        </a>
                    </div>
                </article>
                <article class="entrada-blog sombra">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Imagen Blog" loading="lazy">
                    </picture>
                    <div class="texto-entrada">
                        <a href="/entrada">
                            <h3>Guía para la decoración de tu hogar</h3>
                            <p>Escrito el: <span>15/4/2023</span> por: <span>Admin</span></p>
                            <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                        </a>
                    </div>
                </article>
        </section>
         
        <section class="testimonios">
            <h2 class="subtitulo">Testimoniales</h2>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p class="alinear-derecha">- Juan Cruz Pineda</p>
            </div>
        </section>
    </div>