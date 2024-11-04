<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Orden de Recepción de Equipos
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
                            <form action="<?php echo base_url(); ?>mantenimiento/cequipos/cinsert" method="POST">
                                <div class="col-sm-2 form-group">
                                  <label for="fecha">Fecha</label>
                                  <input type="date" id="txtfecha" name="txtfecha" min="1"  class="form-control" value="<?php echo set_value('txtfecha') ?>" required >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label" for="tipo_cliente">CLIENTE (*)</label>
                                    <?$this->select_items->sin_buscador($tipo_cliente_select, '','tipo_cliente','1', 'required');?>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label for="marca">Marca</label>
                                    <input type="text" id="txtmarca" name="txtmarca"maxlength="1000" class="form-control" value="<?php echo set_value('txtmarca') ?>"  >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="modelo">Modelo</label>
                                    <input type="text" id="txtmodelo" name="txtmodelo" maxlength="950"class="form-control" value="<?php echo set_value('txtmodelo') ?>"  >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="serie">Número serie</label>
                                    <input type="text" id="txtserie" name="txtserie" maxlength="950"class="form-control" value="<?php echo set_value('txtserie') ?>"  >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="sector">Sector</label>
                                    <input type="text" id="txtsector" name="txtsector" maxlength="950"class="form-control" value="<?php echo set_value('txtsector') ?>"  >
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="accesorios">Accesorios</label>
                                    <input type="text" id="txtaccesorios" name="txtaccesorios" maxlength="950"class="form-control" value="<?php echo set_value('txtaccesorios') ?>"  >
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" id="txtdescripcion" name="txtdescripcion" maxlength="950"class="form-control" value="<?php echo set_value('txtdescripcion') ?>"  >
                                </div>
                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-info" href="<?php echo base_url(); ?>mantenimiento/cequipos">Volver</a>
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