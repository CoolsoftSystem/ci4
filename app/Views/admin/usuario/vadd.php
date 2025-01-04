<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Usuarios
            <small>Nuevo</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <p><?= session()->getFlashdata('error') ?></p>
                                </div>
                            <?php endif; ?>
                            <form action="<?= base_url(); ?>mantenimiento/cusuario/cinsert" method="POST">
                                <div class="col-sm-4 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="txtnombre" name="txtnombre" class="form-control" value="<?= old('txtnombre') ?>" required>
                                    <?= isset($validation) ? display_error($validation, 'txtnombre') : ''; ?>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="apellido">Email</label>
                                    <input type="text" id="txtemail" name="txtemail" class="form-control" value="<?= old('txtemail') ?>">
                                    <?= isset($validation) ? display_error($validation, 'txtemail') : ''; ?>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="usuario_select">Privilegios</label>
                                    <?= $select_items->sin_buscador_priv($usuario_select, '', 'usuario_select', '1', 'required'); ?>
                                    <?= isset($validation) ? display_error($validation, 'usuario_select') : ''; ?>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="Contraseña">Contraseña</label>
                                    <input type="text" id="txtContraseña" name="txtContraseña" class="form-control" value="<?= old('txtContraseña') ?>" required>
                                    <?= isset($validation) ? display_error($validation, 'txtContraseña') : ''; ?>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-default" href="<?= base_url(); ?>mantenimiento/cusuario">Volver</a>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
