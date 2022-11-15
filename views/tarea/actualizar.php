<div class="contenedor login">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>
    <div class="barra-usuario">
        <h3>Hola <?php echo $datosPuesto[0]->nombreUsuario; ?></h3>
        <h3><?php echo $datosPuesto[0]->nombrePuesto; ?></h3>
    </div>
    <div class="barra-botones">
        <a href="/tarea" class="boton-regresar">Regresar</a>
        <a href="/logout" class="boton-logout">Cerrar Sesión</a>
    </div>
    <h3 class="titulo-crear">Actualizar tarea</h3>
    <div class="contenedor-sm">
        <form class="formulario" method="POST">
            <?php include_once __DIR__ . '/formulario.php'; ?>
            <input type="submit" class="boton" value="Actualizar Tarea">
        </form>
    </div>
</div>