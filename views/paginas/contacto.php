<main class="contenedor seccion">
        <h1 class="subtitulo">Contacto</h1>

        <?php if($mensaje) { ?>
            <p class="alerta correcto"> <?php echo $mensaje; ?> </p>
        <?php } ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen Contacto" loading="lazy">
        </picture>
        <h2 class="subtitulo">Llene el formulario de Contacto</h2>

        <form id="miFormulario" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu Nombre" name="contacto[nombre]" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" placeholder="Escribe un mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>
                
                <label for="nombre">Vende o Compra:</label>
                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="precio">Precio o Presupuesto</label>
                <input id="precio" type="number" placeholder="Tu precio o Presupuesto" name="contacto[precio]" required>
            </fieldset>
            
            <fieldset>
                <legend>Contacto</legend>

                <div class="form-contacto" >
                    <label for="contactar-telefono">Teléfono</label>
                    <input value="telefono" id="contactar-telefono" type="radio" name="contacto[contacto]" required>
                
                    <label for="contactar-email">E-mail</label>
                    <input value="email" id="contactar-email" type="radio" name="contacto[contacto]" required>
                </div> 

                <div id="contacto"></div>


            </fieldset>

            <input type="submit" class="boton-verde boton-formu">
        </form>
    </main>