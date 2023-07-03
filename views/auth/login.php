<main class="contenedor seccion contenido-centrado">
    <h1 class="subtitulo">Iniciar Sesión</h1>

    <?php foreach($errores as $error) : ?>
        <p class="alerta error"><?php echo $error ?></p>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/login">
        <fieldset>
            <legend>E-mail y Password</legend>

            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" placeholder="Ingresa tu e-mail"  >

            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Ingresa tu password" >
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class=" boton-verde boton-formu">
    </form>
</main>