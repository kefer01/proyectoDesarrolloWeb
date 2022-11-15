<div class="campo">
    <label for="usuarioCreador">Creador</label>
    <input type="hidden" name="usuarioCreador" value="<?php echo $_SESSION['id']; ?>">
    <input type="text" name="nombreCreador" value="<?php echo $_SESSION['nombre']; ?>" disabled>
</div>
<div class="campo">
    <label for="usuarioResponsable">Responsable</label>
    <select name="usuarioResponsable">
        <option value="">-- Seleccione --</option>
        <?php foreach ($usuarios as $usuario) :
            if ($datosPuesto[0]->nivel === '1') { ?>
                <option <?php echo $usuario->id === $tarea->usuarioResponsable ? 'selected' : ''; ?> value="<?php echo s($usuario->id); ?>"><?php echo s($usuario->nombre) . ' ' . s($usuario->apellido); ?></option>
                <?php };
            if ($datosPuesto[0]->nivel === '2') {
                if (($usuario->nivel == 2 || ($usuario->nivel == 4))) { ?>
                    <option <?php echo $usuario->id === $tarea->usuarioResponsable ? 'selected' : ''; ?> value="<?php echo s($usuario->id); ?>"><?php echo s($usuario->nombre) . ' ' . s($usuario->apellido); ?></option>
                <?php }
            }
            if ($datosPuesto[0]->nivel === '3') {
                if (($usuario->nivel == 3 || ($usuario->nivel == 5))) { ?>
                    <option <?php echo $usuario->id === $tarea->usuarioResponsable ? 'selected' : ''; ?> value="<?php echo s($usuario->id); ?>"><?php echo s($usuario->nombre) . ' ' . s($usuario->apellido); ?></option>
                <?php  }
            }
            if (($datosPuesto[0]->nivel === '4') && ($usuario->nivel == 4)) { ?>
                <option <?php echo $usuario->id === $tarea->usuarioResponsable ? 'selected' : ''; ?> value="<?php echo s($usuario->id); ?>"><?php echo s($usuario->nombre) . ' ' . s($usuario->apellido); ?></option>
            <?php  }
            if (($datosPuesto[0]->nivel === '5') && ($usuario->nivel == 5)) { ?>
                <option <?php echo $usuario->id === $tarea->usuarioResponsable ? 'selected' : ''; ?> value="<?php echo s($usuario->id); ?>"><?php echo s($usuario->nombre) . ' ' . s($usuario->apellido); ?></option>
        <?php  }
            continue;
        endforeach; ?>
    </select>
</div>
<div class="campo">
    <label for="nombreTarea">Tarea</label>
    <input type="text" name="nombreTarea" id="nombreTarea" placeholder="Nombre de la Tarea" value="<?php echo $tarea->nombreTarea; ?>">
</div>
<div class="campo">
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" id="descripcion" placeholder="Descripción de la tarea" value="<?php echo $tarea->descripcion; ?>">
</div>