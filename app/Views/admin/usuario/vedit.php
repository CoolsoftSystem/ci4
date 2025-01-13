<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Usuarios
            <small>Editar</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
               <hr>
               <div class="row">
                   <div class="col-md-12">
                       <?php if($session->getFlashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $session->getFlashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?= base_url('mantenimiento/cusuario/cupdate') ?>" method="POST">
                <!-- Campo oculto para el ID del usuario y el ID del rol -->
                <input type="hidden" name="txtidusuario" value="<?= $usuarioedit->idUsuario ?>">
                <input type="hidden" name="txtidrol" value="<?= $usuarioedit->idRol ?>">

                <!-- Campo Nombre -->
                <div class="form-group col-sm-4">
                    <label for="txtnombre">Nombre</label>
                    <input type="text" id="txtnombre" name="txtnombre" value="<?= $usuarioedit->nombre ?>" class="form-control" required>
                </div>

                <!-- Campo Email -->
                <div class="form-group col-sm-4">
                    <label for="txtemail">Email</label>
                    <input type="text" id="txtemail" name="txtemail" value="<?= $usuarioedit->email ?>" class="form-control">
                </div>

                <!-- Campo Privilegios -->
                <div class="form-group col-sm-4">
                <label for="usuario">Privilegios</label>
                <?= $select_items->sin_buscador_roles(
                    $usuario_select,
                    (!empty($model->idRol)) ? $model->idRol : '',
                    'usuario',
                    '1',
                    (!empty($consultar)) ? 'disabled' : 'required'
                ); ?>
            </div>
                </div>

                <!-- Campo Contraseña -->
                <div class="form-group col-sm-4">
                    <label for="txtContraseña">Contraseña</label>
                    <input type="text" id="txtContraseña" name="txtContraseña" value="<?= $usuarioedit->pass ?>" class="form-control" required>
                </div>

                <!-- Botones -->
                <div class="form-group col-sm-12">
                    <a class="btn btn-success" href="<?= base_url('mantenimiento/cusuario') ?>">Volver</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>

               </div>
            </div>
        </div>
    </section>
</div>
 <!-- <input type="hidden" value="<?php## echo $usuarioedit->usuario ?>" name="txtnombreviejo" id="txtnombreviejo">