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
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <p><?php echo $this->session->flashdata('error') ?></p>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url(); ?>mantenimiento/ctecnico/cinsert" method="POST">
                                <div class=" col-sm-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="txtnombre" name="txtnombre" maxlength="256"class="form-control" value="<?php echo set_value('txtnombre') ?>" required >
                                </div>
                                <div class="col-sm-2 form-group">
                                  <label for="dni">DNI</label>
                                  <input type="number" id="txtdni" name="txtdni" min="1" max="99999999"  class="form-control" value="<?php echo set_value('txtdni') ?>" required >
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" id="txttelefono" name="txttelefono" class="form-control" value="<?php echo set_value('txttelefono') ?>"  >
                                </div>

                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-success" href="<?php echo base_url(); ?>mantenimiento/ctecnico">Volver</a>
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
