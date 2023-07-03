<?php

namespace Model;

class Propiedad extends ActiveRecord {
    
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];
    // jeje
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date("Y/m/d");
        $this->vendedores_id = $args['vendedores_id'] ?? 1;
    }

    public function validar() {
 
        if(!$this->titulo) {
            self::$errores[] = "El titulo es obligatorio";
        }
        if(!$this->precio) {
            self::$errores[] = "Debes poner un precio";
        }
        if(!$this->imagen) {
            self::$errores[] = "Elige una Imagen";
        }
        if(!$this->descripcion) {
            self::$errores[] = "La propiedad necesita una descripción";
        }
        if(!$this->habitaciones) {
            self::$errores[] = "Debes poner el número de habitaciones";
        }
        if(!$this->wc) {
            self::$errores[] = "Debes poner el número de baños";
        }
        if(!$this->estacionamiento) {
            self::$errores[] = "Debes poner el número de estacionamientos";
        }
        if(!$this->vendedores_id) {
            self::$errores[] = "Elige el vendedor";
        }

        return self::$errores;
    }
}