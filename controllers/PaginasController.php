<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController {

    public static function index( Router $router ) {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros( Router $router ) {
        $router->render('paginas/nosotros');
    }

    public static function propiedades( Router $router ) {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad( Router $router ) {
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog( Router $router ) {
        $router ->render('paginas/blog');
    }

    public static function entrada( Router $router ) {
        $router ->render('paginas/entrada');
    }

    public static function contacto( Router $router ) {
        
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuesta = $_POST['contacto'];
            
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['EMAIL_PORT'];
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';

            // Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje </p>';
            $contenido .= '<p> Nombre: ' . $respuesta['nombre'] . '</p>';
            $contenido .= '<p> Mensaje: '. $respuesta['mensaje']. '</p>';
            $contenido .= '<p> Asunto: ' . $respuesta['tipo'] . '</p>';

            // Compra o Venta
            if( $respuesta['tipo'] === 'Compra' ) {
                $contenido .= '<p> Presupuesto: $' . $respuesta['precio'] . '</p>';
            } elseif ( $respuesta['tipo'] === 'Venta' ) {
                $contenido .= '<p> Precio: $' . $respuesta['precio'] . '</p>';
            }

            // Telefono o email
            if( $respuesta['contacto'] === 'telefono' ) {
                $contenido .= '<p> Eligio ser contactado por telefono: ' . $respuesta['telefono'] . '</p>';
                $contenido .= '<p> Fecha: '. $respuesta['fecha']. '</p>';
                $contenido .= '<p> Hora: '. $respuesta['hora']. '</p>';
            } elseif ( $respuesta['contacto'] === 'email' ) {
                $contenido .= '<p> Eligio ser contactado por email: ' . $respuesta['email'] . '</p>';
            }
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Texto Alternativo';

            // Enviar el mail
            if($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar...";
            }
        }

        $router -> render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);


    }
}

