<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Roles
            <small>Nuevo</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <p><?= session()->getFlashdata('error') ?></p>
                                </div>
                            <?php endif; ?>
                            <form action="<?= base_url(); ?>mantenimiento/croles/cinsert" method="POST">
                                <div class="col-sm-12 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="txtnombre" name="txtnombre" class="form-control" value="<?= old('txtnombre') ?>" required>
                                    <?= isset($validation) ? display_error($validation, 'txtnombre') : ''; ?>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="tipo_usuario">Vistas permitidas</label><br>
                                </div>
                                <?php
                                    $permissions = [
                                        'cliente' => 'Cliente',
                                        'tecnico' => 'Técnicos',
                                        'ordenes' => 'Órdenes',
                                        'usu' => 'Usuarios',
                                        'rol' => 'Roles',
                                        'estado' => 'Estados de Trabajo',
                                        'equipos' => 'Recepción de Equipos',
                                        'remitos' => 'Remitos',
                                        'proveedores' => 'Proveedores'
                                    ];
                                    foreach ($permissions as $name => $label):
                                ?>
                                    <div class="col-sm-2 form-group">
                                        <label><?= $label ?></label>
                                        <input class="chk_input" type="checkbox" id="<?= $name ?>" name="<?= $name ?>" data-width="20" data-height="20" <?= old($name) ? 'checked' : '' ?> />
                                        <span class="checkmark"></span>
                                    </div>
                                <?php endforeach; ?>

                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-default" href="<?= base_url(); ?>mantenimiento/croles">Volver</a>
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
