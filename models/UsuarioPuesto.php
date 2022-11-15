<?php

namespace Model;

class UsuarioPuesto extends ActiveRecord {
    protected static $tabla = 'puestos';
    protected static $columnasDB = ['nombreUsuario', 'nombrePuesto', 'id', 'nivel'];

    public $nombreUsuario;
    public $nombrePuesto;
    public $id;
    public $nivel;


    public function __construct()
    {
        $this->nombreUsuario = $args['nombreUsuario'] ?? '';
        $this->nombrePuesto = $args['nombrePuesto'] ?? '';
        $this->id = $args['id'] ?? null;
        $this->nivel = $args['nivel'] ?? '3';
    }
}