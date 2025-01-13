<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Material
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
                        <form action="<?= base_url('mantenimiento/cparteorden/cupdateMat') ?>" method="POST">
    <input type="hidden" name="txtid" value="<?= $materialedit->IdMat ?>">

    <!-- Campo Descripción -->
    <div class="form-group">
        <label for="txtdescripcion">Descripción</label>
        <input type="text" id="txtdescripcion" name="txtdescripcion" class="form-control" 
               value="<?= $materialedit->Descripcion ?>" maxlength="150">
    </div>

    <!-- Campo Cantidad -->
    <div class="form-group">
        <label for="txtcantidad">Cantidad</label>
        <input type="text" id="txtcantidad" name="txtcantidad" class="form-control" 
               value="<?= $materialedit->Cantidad ?>">
    </div>

    <!-- Campo Precio -->
    <div class="form-group">
        <label for="txtprecio">Precio</label>
        <input type="number" id="txtprecio" name="txtprecio" class="form-control" 
               value="<?= $materialedit->Precio ?>" step="0.01">
    </div>

    <!-- Botones -->
    <div class="form-group">
        <a class="btn btn-success" href="<?= base_url('mantenimiento/cparteorden/cedit/' . $materialedit->IdParte) ?>">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

               </div>
            </div>
        </div>
    </section>
</div>
