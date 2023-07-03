<main class="main-anuncio">
    <h1 class="subtitulo"><?php echo $propiedad->titulo; ?></h1>
    <div class="contenedor sombra contenedor-anuncio">
        <picture>
            <img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy">
        </picture>
        <div class="contenido-anuncio">
            <p class="precio">$ <?php echo number_format($propiedad->precio); ?></p>
            <ul class="iconos-anuncios">
                <li> 
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li> 
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li> 
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad->descripcion; ?></p>
        </div>
    </div> <!-- anuncios -->
    <div class="alinear-centro">
        <a href="/propiedades" class="boton-rojo">Volver</a>
    </div>
    
</main>