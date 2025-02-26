<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Tarea
           <small>Nuevo</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if ($session->getFlashdata('error')):?>
                                <div class="alert alert-danger">
                                    <p><?php echo $session->getFlashdata('error') ?></p>
                                </div>
                            <?php endif;  ?>
                            <form action="<?= base_url(); ?>mantenimiento/cparteorden/cinsert" method="POST">
                                <input type="hidden" value="<?= $ordenindex->IdOrden ?>" name="txtidorden" id="txtidorden">

                                <div class="col-sm-12 form-group">
                                    <label for="tarea">Tarea</label>
                                    <input type="text" id="txttarea" name="txttarea" maxlength="1000" class="form-control" value="<?= old('txttarea'); ?>" required>
                                    <?= isset($validation) ? display_error($validation, 'txttarea') : ''; ?>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-success" href="<?= base_url(); ?>mantenimiento/cparteorden/listar/<?= $ordenindex->IdOrden ?>">Volver</a>
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
$('#buscar2').on('click', function() {
    var tecnico = $('#tipo_tecnico').val();
    var idOrden = $('#txtidorden').val();

    $.ajax({
        method: 'POST',
        url: '<?= base_url(); ?>' + 'mantenimiento/Cparteorden/addTecnicoOrdenNueva',
        dataType: 'html',
        data: {tecnico: tecnico, idOrden: idOrden}
    })
    .done(function(r) {
        r = JSON.parse(r);
        var tel = '<tr><td>' + tecnico + '</td><td><div><a title="Eliminar" href="' + tecnico + '_' + idOrden + '" class="btn btn-danger"><span class="fa fa-remove"></span></a></div></td></tr>';
        $("#tbody2").append(tel);
    });
});
</script>
