<?php

namespace Controllers;

use Model\Tarea;
use Model\Usuario;
use Model\UsuarioPuesto;
use MVC\Router;

class TareaController {
    public static function index(Router $router) {
        iniciaSesion();
        $usuarioLogin = $_SESSION;
        $idUser = $usuarioLogin['id'];

        //Consulta datos de usuario y puesto
        $consulta = "SELECT CONCAT(usuarios.nombre,' ', usuarios.apellido) AS nombreUsuario,";
        $consulta .= " puestos.nombrePuesto, puestos.id, usuarios.nivel FROM puestos";
        $consulta .= " LEFT OUTER JOIN usuarios  ON puestos.id=usuarios.puesto";
        $consulta .= " WHERE usuarios.id = '${idUser}'";

        $datosPuesto = UsuarioPuesto::SQL($consulta);

        $usuarios = Usuario::all();
        $tareas =  Tarea::all();

        $router->render('tarea/index', [
            'titulo' => 'Tareas',
            'usuarioLogin' => $usuarioLogin,
            'datosPuesto' => $datosPuesto,
            'tareas' => $tareas,
            'usuarios' => $usuarios
        ]);
    }

    public static function crear(Router $router) {
        //Instanciar usuario
        $tarea = new Tarea;

        //Alertas vacias 
        $alertas = [];

        iniciaSesion();
        $usuarioLogin = $_SESSION;
        $idUser = $usuarioLogin['id'];

        //Consulta datos de usuario y puesto
        $consulta = "SELECT CONCAT(usuarios.nombre,' ', usuarios.apellido) AS nombreUsuario,";
        $consulta .= " puestos.nombrePuesto, puestos.id, usuarios.nivel FROM puestos";
        $consulta .= " LEFT OUTER JOIN usuarios  ON puestos.id=usuarios.puesto";
        $consulta .= " WHERE usuarios.id = '${idUser}'";

        $datosPuesto = UsuarioPuesto::SQL($consulta);
        $usuarios = Usuario::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea->sincronizar($_POST);
            $alertas = $tarea->validarNuevaTarea();

            //Revisar que alertas este vacio
            if (empty($alertas)) {
                //Crear la tarea
                $resultado = $tarea->guardar();
                if ($resultado) {
                    header('Location: /tarea');
                }
            }
        }

        // Render a la vista
        $router->render('tarea/crear', [
            'titulo' => 'Crear Nueva Tarea',
            'datosPuesto' => $datosPuesto,
            'usuarios' => $usuarios,
            'tarea' => $tarea
        ]);
    }

    public static function finalizar() {
        iniciaSesion();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $tarea = Tarea::find($id);
            $arreglo['estatus'] = '2';
            $tarea->sincronizar($arreglo);

            $tarea->guardar();
            header('Location: /tarea');
        }
    }

    public static function actualizar(Router $router) {
        iniciaSesion();

        if (!is_numeric($_GET['id'])) return;
        $tarea = Tarea::find($_GET['id']);
        $alertas = [];

        $usuarioLogin = $_SESSION;
        $idUser = $usuarioLogin['id'];

        //Consulta datos de usuario y puesto
        $consulta = "SELECT CONCAT(usuarios.nombre,' ', usuarios.apellido) AS nombreUsuario,";
        $consulta .= " puestos.nombrePuesto, puestos.id, usuarios.nivel FROM puestos";
        $consulta .= " LEFT OUTER JOIN usuarios  ON puestos.id=usuarios.puesto";
        $consulta .= " WHERE usuarios.id = '${idUser}'";

        $datosPuesto = UsuarioPuesto::SQL($consulta);
        $usuarios = Usuario::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea->sincronizar($_POST);
            $alertas = $tarea->validarNuevaTarea();

            if (empty($alertas)) {
                $tarea->guardar();
                header('Location: /tarea');
            }
        }
        // debuguear($tarea);
        $router->render('tarea/actualizar', [
            'titulo' => 'Actualizar Tarea',
            'datosPuesto' => $datosPuesto,
            'usuarios' => $usuarios,
            'alertas' => $alertas,
            'tarea' => $tarea
        ]);
    }
}
