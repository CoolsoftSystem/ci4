<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cliente
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
                            <form action="<?= base_url('mantenimiento/ccliente/cinsert') ?>" method="POST">
                                <div class="col-sm-2 form-group">
                                    <label for="cuit">CUIT</label>
                                    <input type="number" id="txtcuit" name="txtcuit" min="1" class="form-control" value="<?= old('txtcuit') ?>" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="txtnombre" name="txtnombre" maxlength="256" class="form-control" value="<?= old('txtnombre') ?>" required>
                                </div>
                                <div class="col-sm-5 form-group">
                                    <label for="iva">I.V.A</label>
                                    <input type="text" id="txtiva" name="txtiva" class="form-control" value="<?= old('txtiva') ?>">
                                </div>
                                <div class="col-sm-5 form-group">
                                    <label for="localidad">Localidad</label>
                                    <input type="text" id="txtlocalidad" name="txtlocalidad" class="form-control" value="<?= old('txtlocalidad') ?>">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="domicilio">Domicilio</label>
                                    <input type="text" id="txtdomicilio" name="txtdomicilio" maxlength="1000" class="form-control" value="<?= old('txtdomicilio') ?>">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="provincia">Provincia</label>
                                    <input type="text" id="txtprovincia" name="txtprovincia" maxlength="50" class="form-control" value="<?= old('txtprovincia') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="mant">Tel Mantenimiento</label>
                                    <input type="number" id="txtmant" name="txtmant" min="1" class="form-control" value="<?= old('txtmant') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="ventas">Tel Ventas</label>
                                    <input type="number" id="txtventas" name="txtventas" min="1" class="form-control" value="<?= old('txtventas') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="comercial">Tel Comercial</label>
                                    <input type="number" id="txtcomercial" name="txtcomercial" min="1" class="form-control" value="<?= old('txtcomercial') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="correo">Mail Mantenimiento</label>
                                    <input type="text" id="txtmmant" name="txtmmant" maxlength="50" class="form-control" value="<?= old('txtmmant') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="correo">Mail Ventas</label>
                                    <input type="text" id="txtmvta" name="txtmvta" maxlength="50" class="form-control" value="<?= old('txtmvta') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="correo">Mail Comercial</label>
                                    <input type="text" id="txtmcial" name="txtmcial" maxlength="50" class="form-control" value="<?= old('txtmcial') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="nom">Nombre y Apellido</label>
                                    <input type="text" id="txtnmant" name="txtnmant" maxlength="50" class="form-control" value="<?= old('txtnmant') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="nom">Nombre y Apellido</label>
                                    <input type="text" id="txtnvta" name="txtnvta" maxlength="50" class="form-control" value="<?= old('txtnvta') ?>">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="nom">Nombre y Apellido</label>
                                    <input type="text" id="txtncial" name="txtncial" maxlength="50" class="form-control" value="<?= old('txtncial') ?>">
                                </div>
                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-info" href="<?= base_url('mantenimiento/ccliente') ?>">Volver</a>
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


