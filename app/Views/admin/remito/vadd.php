<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Remito
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
                            <form action="<?php echo base_url(); ?>mantenimiento/cremitos/cinsert" method="POST">
                                <div class="col-sm-2 form-group">
                                  <label for="fecha">FECHA</label>
                                  <input type="date" id="txtfecha" name="txtfecha" class="form-control" min="2020-01-01" max="2100-12-31" value="<?php echo set_value('txtfecha') ?>" required >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label" for="tipo_cliente">CLIENTE (*)</label>
                                    <?$this->select_items->sin_buscador($tipo_cliente_select, '','tipo_cliente','1', 'required');?>
                                </div>
                                <div class=" col-sm-12 form-group">
                                    <label for="obser">OBSERVACIONES</label>
                                    <input type="text" id="txtobservaciones" name="txtobservaciones" maxlength="200"class="form-control" value="<?php echo set_value('txtobservaciones') ?>">
                                </div>
                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-info" href="<?php echo base_url(); ?>mantenimiento/cremitos">Volver</a>
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

<script type="text/javascript">

  $('#buscar1').on('click',function(){
      $("#exampleModal").modal("show");
  });

 

</script>
