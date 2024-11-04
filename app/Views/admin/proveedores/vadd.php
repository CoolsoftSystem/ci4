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
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <p><?php echo $this->session->flashdata('error') ?></p>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url(); ?>mantenimiento/cproveedores/cinsert" method="POST">
                                <div class=" col-sm-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="txtnombre" name="txtnombre" maxlength="50"class="form-control" value="<?php echo set_value('txtnombre') ?>"  required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="domicilio">Domicilio</label>
                                    <input type="text" id="txtdomicilio" name="txtdomicilio"maxlength="100" class="form-control" value="<?php echo set_value('txtdomicilio') ?>"  >
                                </div>
                                <div class=" col-sm-12 form-group">
                                    <label for="producto">Producto</label>
                                    <input type="text" id="txtproducto" name="txtproducto" class="form-control" maxlength="200" value="<?php echo set_value('txtproducto') ?>"  >
                                </div>
                                
                                <div class="col-sm-4 form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="number" id="txttelefono" name="txttelefono" class="form-control"maxlength="50" value="<?php echo set_value('txttelefono') ?>"  >
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="txtemail" name="txtemail" class="form-control"maxlength="50" value="<?php echo set_value('txtemail') ?>"  >
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="contacto">Nombre de Contacto</label>
                                    <input type="text" id="txtcontacto" name="txtcontacto" class="form-control"maxlength="50" value="<?php echo set_value('txtcontacto') ?>"  >
                                </div>
                        
                                <div class="col-sm-12 form-group">
                                    <label for="descripcion">Informacion Adicional</label>
                                    <input type="text" id="txtdescripcion" name="txtdescripcion" maxlength="100"class="form-control" value="<?php echo set_value('txtdescripcion') ?>"  >
                                </div>
                               
                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-info" href="<?php echo base_url(); ?>mantenimiento/cproveedores">Volver</a>
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
