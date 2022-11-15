<div class="contenedor login">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>
    <div class="barra-usuario">
        <h3>Hola <?php echo $datosPuesto[0]->nombreUsuario; ?></h3>
        <h3><?php echo $datosPuesto[0]->nombrePuesto; ?></h3>
    </div>
    <div class="barra-botones">
        <a href="/tarea/crear" class="boton-crear">Nueva Tarea</a>
        <a href="/logout" class="boton-logout">Cerrar Sesión</a>
    </div>

    <div class="tareas">
        <div class="titulos">
            <p>Id Tarea</p>
            <p>Tarea</p>
            <p>Descripcion</p>
            <p>Estatus</p>
            <p>Responsable</p>
            <p>Acciones</p>
        </div>
        <?php foreach ($tareas as $tarea) :
            if ($datosPuesto[0]->nivel === '1') { ?>
                <div class="tarea">
                    <div><?php echo $tarea->id; ?> </div>
                    <div><?php echo $tarea->nombreTarea; ?></div>
                    <div><?php echo $tarea->descripcion; ?></div>
                    <div><?php echo $tarea->estatus == 1 ? 'Pendiente' : 'Completada'; ?></div>
                    <div>
                        <?php foreach ($usuarios as $usuario) {
                            if ($usuario->id == $tarea->usuarioResponsable) {
                                echo $usuario->nombre . ' ' . $usuario->apellido;
                            }
                            continue;
                        }  ?>
                    </div>
                    <?php if ($datosPuesto[0]->id == $tarea->usuarioResponsable) {
                    ?>
                        <div class="acciones-tarea">
                            <form action="/tarea/finalizar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                                <input type="submit" value="Completar" class="boton-actualizar" <?php echo $tarea->estatus == 2 ? 'disabled="true"' : ''; ?>>
                            </form>
                            <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                        </div>
                    <?php } else { ?>
                        <div class="acciones-tarea">
                            <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                        </div>
                    <?php } ?>
                </div>
                <?php };
            if ($datosPuesto[0]->nivel === '2') {
                if (($tarea->usuarioResponsable == 2 || ($tarea->usuarioResponsable == 4))) { ?>
                    <div class="tarea">
                        <div><?php echo $tarea->id; ?> </div>
                        <div><?php echo $tarea->nombreTarea; ?></div>
                        <div><?php echo $tarea->descripcion; ?></div>
                        <div><?php echo $tarea->estatus == 1 ? 'Pendiente' : 'Completada'; ?></div>
                        <div>
                            <?php foreach ($usuarios as $usuario) {
                                if ($usuario->id == $tarea->usuarioResponsable) {
                                    echo $usuario->nombre . ' ' . $usuario->apellido;
                                }
                                continue;
                            }  ?>
                        </div>
                        <?php if ($datosPuesto[0]->id == $tarea->usuarioResponsable) {
                        ?>
                            <div class="acciones-tarea">
                                <form action="/tarea/finalizar" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                                    <input type="submit" value="Completar" class="boton-actualizar" <?php echo $tarea->estatus == 2 ? 'disabled="true"' : ''; ?>>
                                </form>
                                <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                            </div>
                        <?php } else { ?>
                            <div class="acciones-tarea">
                                <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                            </div>
                        <?php } ?>
                    </div>
                <?php }
            }
            if ($datosPuesto[0]->nivel === '3') {
                if (($tarea->usuarioResponsable == 3 || ($tarea->usuarioResponsable == 5))) { ?>
                    <div class="tarea">
                        <div><?php echo $tarea->id; ?> </div>
                        <div><?php echo $tarea->nombreTarea; ?></div>
                        <div><?php echo $tarea->descripcion; ?></div>
                        <div><?php echo $tarea->estatus == 1 ? 'Pendiente' : 'Completada'; ?></div>
                        <div>
                            <?php foreach ($usuarios as $usuario) {
                                if ($usuario->id == $tarea->usuarioResponsable) {
                                    echo $usuario->nombre . ' ' . $usuario->apellido;
                                }
                                continue;
                            }  ?>
                        </div>
                        <?php if ($datosPuesto[0]->id == $tarea->usuarioResponsable) {
                        ?>
                            <div class="acciones-tarea">
                                <form action="/tarea/finalizar" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                                    <input type="submit" value="Completar" class="boton-actualizar" <?php echo $tarea->estatus == 2 ? 'disabled="true"' : ''; ?>>
                                </form>
                                <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                            </div>
                        <?php } else { ?>
                            <div class="acciones-tarea">
                                <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                            </div>
                        <?php } ?>
                    </div>
                <?php  }
            }
            if (($datosPuesto[0]->nivel === '4') && ($tarea->usuarioResponsable == 4)) { ?>
                <div class="tarea">
                    <div><?php echo $tarea->id; ?> </div>
                    <div><?php echo $tarea->nombreTarea; ?></div>
                    <div><?php echo $tarea->descripcion; ?></div>
                    <div><?php echo $tarea->estatus == 1 ? 'Pendiente' : 'Completada'; ?></div>
                    <div>
                        <?php foreach ($usuarios as $usuario) {
                            if ($usuario->id == $tarea->usuarioResponsable) {
                                echo $usuario->nombre . ' ' . $usuario->apellido;
                            }
                            continue;
                        }  ?>
                    </div>
                    <?php if ($datosPuesto[0]->id == $tarea->usuarioResponsable) {
                    ?>
                        <div class="acciones-tarea">
                            <form action="/tarea/finalizar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                                <input type="submit" value="Completar" class="boton-actualizar" <?php echo $tarea->estatus == 2 ? 'disabled="true"' : ''; ?>>
                            </form>
                            <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                        </div>
                    <?php } else { ?>
                        <div class="acciones-tarea">
                            <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                        </div>
                    <?php } ?>
                </div>
            <?php  }
            if (($datosPuesto[0]->nivel === '5') && ($tarea->usuarioResponsable == 5)) { ?>
                <div class="tarea">
                    <div><?php echo $tarea->id; ?> </div>
                    <div><?php echo $tarea->nombreTarea; ?></div>
                    <div><?php echo $tarea->descripcion; ?></div>
                    <div><?php echo $tarea->estatus == 1 ? 'Pendiente' : 'Completada'; ?></div>
                    <div>
                        <?php foreach ($usuarios as $usuario) {
                            if ($usuario->id == $tarea->usuarioResponsable) {
                                echo $usuario->nombre . ' ' . $usuario->apellido;
                            }
                            continue;
                        }  ?>
                    </div>
                    <?php if ($datosPuesto[0]->id == $tarea->usuarioResponsable) {
                    ?>
                        <div class="acciones-tarea">
                            <form action="/tarea/finalizar" method="POST">
                                <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                                <input type="submit" value="Completar" class="boton-actualizar" <?php echo $tarea->estatus == 2 ? 'disabled="true"' : ''; ?>>
                            </form>
                            <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                        </div>
                    <?php } else { ?>
                        <div class="acciones-tarea">
                            <a href="/tarea/actualizar?id=<?php echo $tarea->id; ?>" class="boton-editar">Editar</a>
                        </div>
                    <?php } ?>
                </div>
        <?php  }
            continue;
        endforeach; ?>
    </div>
</div>