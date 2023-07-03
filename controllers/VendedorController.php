<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController { 
    public static function crear(Router $router) {

        $vendedor = new Vendedor;
        // Arreglo con msj de errores
        $errores = Vendedor::getErrores(); 

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $vendedor = new Vendedor($_POST["vendedor"]);
    
            /** SUBIDA DE ARCHIVOS */
    
            // Generar nombre unico
            $nombreImagen = md5( uniqid( rand(), true) ) . ".png";
    
            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['vendedor']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600);
                $vendedor->setImagen($nombreImagen);
            }

            // Validar
            $errores = $vendedor->validar();

            if(empty($errores)) {

                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $vendedor->guardar();
            }
        }
        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) { 
        $id = validarORedireccionar('/admin');
        $vendedor = Vendedor::find($id);
        // Arreglo con msj de errores
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $args = $_POST['vendedor'];
        
            $vendedor->sincronizar($args);
        
            // Validacion
            $errores = $vendedor->validar();
        
            // Subida de archivos
            // Generar nombre unico
            $nombreImagen = md5( uniqid( rand(), true) ) . ".png";
        
            if($_FILES['vendedor']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600);
                $vendedor->setImagen($nombreImagen);
            }
        
            if(empty($errores)) {
                // Almacenar la imagen
                if($_FILES['vendedor']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen );
                }
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Validar el ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
 
            if($id) {
                // Valida el tipo a Eliminar
                $tipo = $_POST['tipo'];
                if(validarTipo($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}