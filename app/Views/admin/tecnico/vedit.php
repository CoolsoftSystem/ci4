<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Técnico
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
                        <form action="<?= base_url('mantenimiento/ctecnico/cupdate') ?>" method="POST">
    <!-- Campo oculto para el DNI del técnico -->
    <input type="hidden" name="txtid" value="<?= $tecnicoedit->Dni ?>">

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="txtnombre">Nombre</label>
        <input type="text" id="txtnombre" name="txtnombre" class="form-control" 
               value="<?= $tecnicoedit->Nombre ?>" maxlength="256" required>
    </div>

    <!-- Campo DNI -->
    <div class="form-group">
        <label for="txtdni">DNI</label>
        <input type="number" id="txtdni" name="txtdni" class="form-control" 
               value="<?= $tecnicoedit->Dni ?>" required>
    </div>

    <!-- Campo Teléfono -->
    <div class="form-group">
        <label for="txttelefono">Teléfono</label>
        <input type="text" id="txttelefono" name="txttelefono" class="form-control" 
               value="<?= $tecnicoedit->Telefono ?>" maxlength="50">
    </div>

    <!-- Botones -->
    <div class="form-group">
        <a class="btn btn-success" href="<?= base_url('mantenimiento/ctecnico') ?>">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

               </div>
            </div>
        </div>
    </section>
</div>
