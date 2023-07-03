<fieldset>
    <legend>Información General</legend>

    <label for="imagen">Foto De Perfil</label>
    <input type="file" name="vendedor[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if($vendedor->imagen) { ?>
        <img src="/imagenes/<?php echo trim($vendedor->imagen); ?>" class="imagen-actu">
    <?php } ?>

    <label for="nombre">Nombre</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre Vendedor/a" value="<?php echo trim(s($vendedor->nombre)); ?>">

    <label for="apellido">Apellido</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido Vendedor/a" value="<?php echo trim(s($vendedor->apellido)); ?>">

    <label for="telefono">Telefono</label>
    <input type="number" name="vendedor[telefono]" id="telefono" placeholder="Telefono Vendedor/a" value="<?php echo trim(s($vendedor->telefono)); ?>">

</fieldset>