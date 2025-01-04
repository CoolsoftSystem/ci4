<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Orden
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
                            <form action="<?= base_url(); ?>mantenimiento/corden/cinsert" method="POST">
                                <div class="col-sm-2 form-group">
                                  <label for="fecha">FECHA</label>
                                  <input type="date" id="txtfecha" name="txtfecha" class="form-control" min="2020-01-01" max="2100-12-31" value="<?= old('txtfecha'); ?>" required>
                                  <?= isset($validation) ? display_error($validation, 'txtfecha') : ''; ?>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label" for="tipo_cliente">CLIENTE (*)</label>
                                    <select name="tipo_cliente" id="tipo_cliente" class="form-control" required>
                                        <option value="">Seleccione Cliente</option>
                                        <?php foreach ($tipo_cliente_select as $cliente) : ?>
                                            <option value="<?= $cliente->ID ?>" <?= old('tipo_cliente') == $cliente->ID ? 'selected' : '' ?>>
                                                <?= $cliente->NOMBRE ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= isset($validation) ? display_error($validation, 'tipo_cliente') : ''; ?>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="tarea">TAREA</label>
                                    <input type="text" id="txttarea" name="txttarea" maxlength="1000" class="form-control" value="<?= old('txttarea'); ?>" required>
                                    <?= isset($validation) ? display_error($validation, 'txttarea') : ''; ?>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="obser">OBSERVACIONES</label>
                                    <input type="text" id="txtobser" name="txtobser" maxlength="1000" class="form-control" value="<?= old('txtobser'); ?>">
                                    <?= isset($validation) ? display_error($validation, 'txtobser') : ''; ?>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-success" href="<?= base_url(); ?>mantenimiento/corden">Volver</a>
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
