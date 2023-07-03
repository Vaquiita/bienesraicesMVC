
<main class="contenedor-admin contenedor seccion">
<h1 class="subtitulo">Admin Bienes Raices</h1>

<?php 
    if($resultado) {
        $mensaje = mostrarAlertas(intval($resultado)); 
        if($mensaje) { ?>
            <p class="alerta correcto"> <?php echo s($mensaje) ?> </p>
        <?php   } 
    } 
?>
    

<div class="botones-crear">
    <a class="boton boton-verde" href="/propiedades/crear">Nueva Propiedad</a>
    <a class="boton boton-verde" href="/vendedores/crear">Nuevo Vendedor/a</a>
</div>

<h2 class="subtitulo">Propiedades</h2>

<table class="propiedades">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($propiedades as $propiedad): ?>
        <tr>
            <td> <?php echo $propiedad->id; ?> </td>
            <td> <?php echo $propiedad->titulo; ?> </td>
            <td> <img class="imagen-tabla" src="/imagenes/<?php echo trim($propiedad->imagen); ?>">  </td>
            <td> $<?php echo $propiedad->precio; ?> </td>
            <td>
                <a class="boton-verde" href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Actualizar</a>

                <form class="form-eliminar" method="POST" action="/propiedades/eliminar">
                    <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                    <input type="hidden" name="tipo" value="propiedades">
                    <input type="submit" class="boton-rojo" value="Eliminar"></input>
                    
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2 class="subtitulo">Vendedores</h2>
    
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto Perfil</th>
                <th>Nombre y Apellido</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vendedores as $vendedor): ?>
            <tr>
                <td> <?php echo $vendedor->id; ?> </td>
                <td> <img class="imagen-tabla" src="/imagenes/<?php echo trim($vendedor->imagen); ?>">  </td>
                <td> <?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?> </td>
                <td> <?php echo $vendedor->telefono; ?> </td>
                <td>
                    <a class="boton-verde" href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>">Actualizar</a>

                    <form class="form-eliminar" method="POST" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedores">
                        <input type="submit" class="boton-rojo" value="Eliminar"></input>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>