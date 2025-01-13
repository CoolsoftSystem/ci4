<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Orden de Recepción de Equipos 
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
                        <form action="<?= base_url('mantenimiento/cequipos/cupdate') ?>" method="POST">
    <!-- Campo oculto para el número de orden -->
    <input type="hidden" name="txtnumorden" value="<?= $equiposedit->num_orden ?>">

    <!-- Campo Fecha -->
    <div class="form-group col-sm-2">
        <label for="txtfecha">Fecha</label>
        <input type="text" id="txtfecha" name="txtfecha" class="form-control" 
               value="<?= date('d/m/Y', strtotime($equiposedit->fecha)) ?>" 
               min="2020-01-01" max="2100-12-31">
    </div>

    <!-- Campo Cliente -->
    <div class="form-group col-md-5">
        <label for="cliente">Cliente&nbsp;&nbsp; (*)</label>
        <?php echo $select_items->sin_buscador5($cliente_select, $equiposedit->id_cliente, 'cliente', '1', !empty($consultar) ? 'disabled' : 'required'); ?>

        <input id="cliente_hidden" name="cliente_hidden" type="hidden">
    </div>

    <!-- Campo Marca -->
    <div class="form-group col-sm-6">
        <label for="txtmarca">Marca</label>
        <input type="text" id="txtmarca" name="txtmarca" class="form-control" 
               value="<?= $equiposedit->marca ?>" maxlength="1000">
    </div>

    <!-- Campo Modelo -->
    <div class="form-group col-sm-6">
        <label for="txtmodelo">Modelo</label>
        <input type="text" id="txtmodelo" name="txtmodelo" class="form-control" 
               value="<?= $equiposedit->modelo ?>" maxlength="950">
    </div>

    <!-- Campo Número de Serie -->
    <div class="form-group col-sm-6">
        <label for="txtserie">Número serie</label>
        <input type="text" id="txtserie" name="txtserie" class="form-control" 
               value="<?= $equiposedit->num_serie ?>" maxlength="950">
    </div>

    <!-- Campo Sector -->
    <div class="form-group col-sm-6">
        <label for="txtsector">Sector</label>
        <input type="text" id="txtsector" name="txtsector" class="form-control" 
               value="<?= $equiposedit->sector ?>" maxlength="950">
    </div>

    <!-- Campo Accesorios -->
    <div class="form-group col-sm-12">
        <label for="txtaccesorios">Accesorios</label>
        <input type="text" id="txtaccesorios" name="txtaccesorios" class="form-control" 
               value="<?= $equiposedit->accesorios ?>" maxlength="950">
    </div>

    <!-- Campo Descripción -->
    <div class="form-group col-sm-12">
        <label for="txtdescripcion">Descripción</label>
        <input type="text" id="txtdescripcion" name="txtdescripcion" class="form-control" 
               value="<?= $equiposedit->descripcion ?>" maxlength="950">
    </div>

    <!-- Botones -->
    <div class="form-group col-sm-6">
        <a class="btn btn-info" href="<?= base_url('mantenimiento/cequipos') ?>">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

               </div>
            </div>
        </div>
    </section>
</div>
