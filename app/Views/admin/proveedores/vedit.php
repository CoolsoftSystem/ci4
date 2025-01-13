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
                       <?php if($session->getFlashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $session->getFlashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?= base_url('mantenimiento/cproveedores/cupdate') ?>" method="POST">
    <!-- Campo oculto para el ID del proveedor -->
    <input type="hidden" name="txtIdProveedores" value="<?= $proveedoresedit->IdProveedores ?>">

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="txtnombre">Nombre</label>
        <input type="text" id="txtnombre" name="txtnombre" class="form-control" 
               value="<?= $proveedoresedit->Nombre ?>" maxlength="50" required>
    </div>

    <!-- Campo Domicilio -->
    <div class="form-group">
        <label for="txtdomicilio">Domicilio</label>
        <input type="text" id="txtdomicilio" name="txtdomicilio" class="form-control" 
               value="<?= $proveedoresedit->Domicilio ?>" maxlength="100">
    </div>

    <!-- Campo Producto -->
    <div class="form-group">
        <label for="txtproducto">Producto</label>
        <input type="text" id="txtproducto" name="txtproducto" class="form-control" 
               value="<?= $proveedoresedit->Producto ?>" maxlength="200">
    </div>

    <!-- Campo Teléfono -->
    <div class="form-group">
        <label for="txttelefono">Teléfono</label>
        <input type="number" id="txttelefono" name="txttelefono" class="form-control" 
               value="<?= $proveedoresedit->Telefono ?>">
    </div>

    <!-- Campo Email -->
    <div class="form-group">
        <label for="txtemail">Email</label>
        <input type="text" id="txtemail" name="txtemail" class="form-control" 
               value="<?= $proveedoresedit->Email ?>">
    </div>

    <!-- Campo Contacto -->
    <div class="form-group">
        <label for="txtcontacto">Nombre de Contacto</label>
        <input type="text" id="txtcontacto" name="txtcontacto" class="form-control" 
               value="<?= $proveedoresedit->Contacto ?>">
    </div>

    <!-- Campo Información Adicional -->
    <div class="form-group">
        <label for="txtdescripcion">Información Adicional</label>
        <input type="text" id="txtdescripcion" name="txtdescripcion" class="form-control" 
               value="<?= $proveedoresedit->Descripcion ?>">
    </div>

    <!-- Botones -->
    <div class="form-group">
        <a class="btn btn-info" href="<?= base_url('mantenimiento/cproveedores') ?>">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

               </div>
            </div>
        </div>
    </section>
</div>
