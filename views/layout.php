<?php
session_start();
$auth = $_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices inicio</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d74a8aa5fa.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : 'inicio2'; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a class="logo" href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo">
                </a>

                <div class="menu-mobile">
                    <img src="/build/img/barras.svg" alt="">
                </div>
                
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" ="">

                        <ul class="navegacion-ul">
                        <?php if(!$auth) : ?>
                            <li class="cuenta-content">
                                <div class="cuenta-a">
                                    <a class="enlace-nav dropbtn" >Cuenta</a>
                                    <i class=" dropbtn fa-sharp fa-solid fa-angle-down"></i>
                                </div>
                                <div class="cuenta-subcontent">
                                    <div class="flecha">
                                        <i class="fa-sharp fa-solid fa-play"></i>
                                        <a class="enlace-nav" class="a" href="/">Registrarse</a>
                                    </div>
                                    <div class="flecha">
                                        <i class="fa-sharp fa-solid fa-play"></i>
                                        <a class="enlace-nav" href="/login">Iniciar Sesion</a>
                                    </div>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="cuenta-content">
                                <div class="cuenta-a">
                                    <a class="enlace-nav dropbtn" >Cuenta</a>
                                    <i class=" dropbtn fa-sharp fa-solid fa-angle-down"></i>
                                </div>
                                <div class="cuenta-subcontent">
                                    <div class="flecha">
                                        <i class="fa-sharp fa-solid fa-play"></i>
                                        <a class="enlace-nav" class="a" href="/admin">Admin</a>
                                    </div>
                                    <div class="flecha">
                                        <i class="fa-sharp fa-solid fa-play"></i>
                                        <a class="enlace-nav" href="/logout">Cerrar Sesion</a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                            <li><a class="enlace-nav" href="/nosotros">Nosotros</a></li>
                            <li><a class="enlace-nav" href="/propiedades">Anuncios</a></li>
                            <li><a class="enlace-nav" href="/blog">Blog</a></li>
                            <li><a class="enlace-nav" href="/contacto">Contacto</a></li>
                        </ul>
                
                </div>
            </div>
            <?php if($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>
    
    <?php echo $contenido; ?>

    <footer>
        <div class="contenedor contenido-header">
            <div class="derecha">
                <ul class="navegacion-ul-footer">
                    <li><a class="enlace-nav" href="/nosotros">Nosotros</a></li>
                    <li><a class="enlace-nav" href="/propiedades">Anuncios</a></li>
                    <li><a class="enlace-nav" href="/blog">Blog</a></li>
                    <li><a class="enlace-nav" href="/contacto">Contacto</a></li>
                </ul>
            </div>
            <p>
                Todos los derechos Reservados <?php echo date('Y') ?> &copy;
            </p>
        </div>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>    