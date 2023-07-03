<?php

define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER["DOCUMENT_ROOT"] . '/imagenes/');

function debugear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitiza el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Validar Tipo
function validarTipo($tipo) {
    $tipos = ['vendedores', 'propiedades'];
    return in_array($tipo, $tipos);
}

// Mostrar Alertas
function mostrarAlertas($codigo) {
    $mensaje = '';
    switch($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        case 4:
            $mensaje = 'Logeado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

// Validar o Redireccionar
function validarORedireccionar(string $url) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: {$url}");
    }

    return $id;
}