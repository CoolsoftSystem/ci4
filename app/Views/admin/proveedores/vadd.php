<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Proveedor
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
                            <form action="<?= base_url(); ?>mantenimiento/cproveedores/cinsert" method="POST">
                                <div class="col-sm-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="txtnombre" name="txtnombre" maxlength="50" class="form-control" value="<?= old('txtnombre') ?>" required>
                                    <?= isset($validation) ? display_error($validation, 'txtnombre') : ''; ?>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="domicilio">Domicilio</label>
                                    <input type="text" id="txtdomicilio" name="txtdomicilio" maxlength="100" class="form-control" value="<?= old('txtdomicilio') ?>">
                                    <?= isset($validation) ? display_error($validation, 'txtdomicilio') : ''; ?>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="producto">Producto</label>
                                    <input type="text" id="txtproducto" name="txtproducto" class="form-control" maxlength="200" value="<?= old('txtproducto') ?>">
                                    <?= isset($validation) ? display_error($validation, 'txtproducto') : ''; ?>
                                </div>

                                <div class="col-sm-4 form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="number" id="txttelefono" name="txttelefono" class="form-control" maxlength="50" value="<?= old('txttelefono') ?>">
                                    <?= isset($validation) ? display_error($validation, 'txttelefono') : ''; ?>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="txtemail" name="txtemail" class="form-control" maxlength="50" value="<?= old('txtemail') ?>">
                                    <?= isset($validation) ? display_error($validation, 'txtemail') : ''; ?>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="contacto">Nombre de Contacto</label>
                                    <input type="text" id="txtcontacto" name="txtcontacto" class="form-control" maxlength="50" value="<?= old('txtcontacto') ?>">
                                    <?= isset($validation) ? display_error($validation, 'txtcontacto') : ''; ?>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="descripcion">Información Adicional</label>
                                    <input type="text" id="txtdescripcion" name="txtdescripcion" maxlength="100" class="form-control" value="<?= old('txtdescripcion') ?>">
                                    <?= isset($validation) ? display_error($validation, 'txtdescripcion') : ''; ?>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-info" href="<?= base_url(); ?>mantenimiento/cproveedores">Volver</a>
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

<script type="text/javascript">
$('#buscar1').on('click', function() {
    $("#exampleModal").modal("show");
});
</script>
