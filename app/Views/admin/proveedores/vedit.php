<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Proveedor
            <small>Editar</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
               <hr>
               <div class="row">
                   <div class="col-md-12">
                       <?php if($this->session->flashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?php echo base_url();?>mantenimiento/cproveedores/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $proveedoresedit->IdProveedores ?>" name="txtIdProveedores" id="txtIdProveedores">
                            
                            <div class="col-sm-6 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" maxlength="50" value="<?php echo !empty(form_error('txtnombre'))? set_value('txtnombre') : $proveedoresedit->Nombre ?>" class= "form-control" required >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" id="txtdomicilio" name="txtdomicilio" maxlength="100" value="<?php echo !empty(form_error('txtdomicilio'))? set_value('txtdomicilio') : $proveedoresedit->Domicilio ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="producto">Producto</label>
                                <input type="text" id="txtproducto" name="txtproducto" maxlength="200" value="<?php echo !empty(form_error('txtproducto'))? set_value('txtproducto') : $proveedoresedit->Producto ?>" class= "form-control"  >
                            </div>
                            
                            <div class="col-sm-4 form-group">
                                <label for="telefono">Telefono</label>
                                <input type="number" id="txttelefono" name="txttelefono" value="<?php echo !empty(form_error('txttelefono'))? set_value('txttelefono') : $proveedoresedit->Telefono ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="email">Email</label>
                                <input type="text" id="txtemail" name="txtemail" value="<?php echo !empty(form_error('txtemail'))? set_value('txtemail') : $proveedoresedit->Email ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="contacto">Nombre de Contacto</label>
                                <input type="text" id="txtcontacto" name="txtcontacto" value="<?php echo !empty(form_error('txtcontacto'))? set_value('txtcontacto') : $proveedoresedit->Contacto ?>" class= "form-control"  >
                            </div>
             
                            <div class="col-sm-12 form-group">
                                <label for="descripcion">Informacion Adicional</label>
                                <input type="text" id="txtdescripcion" name="txtdescripcion" value="<?php echo !empty(form_error('txtdescripcion'))? set_value('txtdescripcion') : $proveedoresedit->Descripcion ?>" class= "form-control"  >
                            </div>
                           
                            <div class="col-sm-12 form-group">
                                <a class="btn btn-info" href="<?php echo base_url();?>mantenimiento/cproveedores">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
