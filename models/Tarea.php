<?php

namespace Model;

class Tarea extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'tareas';
    protected static $columnasDB = ['id','usuarioCreador','usuarioResponsable','nombreTarea', 'descripcion', 'estatus'];

    public $id;
    public $usuarioCreador;
    public $usuarioResponsable;
    public $nombreTarea;
    public $descripcion;
    public $estatus;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuarioCreador = $args['usuarioCreador'] ?? '';
        $this->usuarioResponsable = $args['usuarioResponsable'] ?? '';
        $this->nombreTarea = $args['nombreTarea'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->estatus = $args['estatus'] ?? '1';
    }

      // Mensajes de validación para la creacion de una tarea
      public function validarNuevaTarea() {
        if (!$this->usuarioResponsable) {
            self::$alertas['error'][] = 'El responsable de la tarea es Obligatorio';
        }
        if (!$this->nombreTarea) {
            self::$alertas['error'][] = 'El Nombre de la tarea es Obligatorio';
        }
        if (strlen($this->nombreTarea) < 6) {
            self::$alertas['error'][] = 'El Nombre de la tarea debe contener al menos 6 caracteres';
        }
        if (!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción es Obligatorio';
        }
        if (strlen($this->descripcion) < 10) {
            self::$alertas['error'][] = 'La descripción debe contener al menos 10 caracteres';
        }

        return self::$alertas;
    }

}