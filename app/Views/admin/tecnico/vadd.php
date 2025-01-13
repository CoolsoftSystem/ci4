<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Técnico
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
                            <form action="<?= base_url('mantenimiento/ctecnico/cinsert') ?>" method="POST">
                                <div class="col-sm-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="txtnombre" name="txtnombre" maxlength="256" class="form-control" value="<?= old('txtnombre') ?>" required>
                                   
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="dni">DNI</label>
                                    <input type="number" id="txtdni" name="txtdni" min="1" max="99999999" class="form-control" value="<?= old('txtdni') ?>" required>
                                    
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" id="txttelefono" name="txttelefono" class="form-control" value="<?= old('txttelefono') ?>" >
                                   
                                </div>

                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-success" href="<?= base_url(); ?>mantenimiento/ctecnico">Volver</a>
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
