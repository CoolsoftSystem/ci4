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
                            <?php if ($this->session->flashdata('error')):?>
                                <div class="alert alert-danger">
                                    <p><?php echo $this->session->flashdata('error')?></p>
                                </div>
                            <?php endif;  ?>
                            <form action="<?php echo base_url();?>mantenimiento/cparteorden/cinsert" method="POST">
                                <input type="hidden" value="<?php echo $ordenindex->IdOrden ?>" name="txtidorden" id="txtidorden">

                                <div class="col-sm-12 form-group">
                                    <label for="tarea" >Tarea</label>
                                    <input type="text" id="txttarea" name="txttarea" maxlength="1000" class="form-control" value="<?php echo set_value('txttarea') ?>" required >
                                </div>

                                <div class="col-sm-12 form-group">
                                <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/cparteorden/listar/<?php echo $ordenindex->IdOrden ?>">Volver</a>
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

$('#buscar2').on('click',function(){
  var tecnico =$('#tipo_tecnico').val();
  var idOrden =$('#txtidorden').val();




            $.ajax( {
                    method:'POST',
                    url:'<?php echo base_url(); ?>' + 'mantenimiento/Cparteorden/addTecnicoOrdenNueva',
                    dataType:'html',
                    data:{tecnico:tecnico,idOrden:idOrden}})
                    .done(function(r) {

                      r = JSON.parse(r);
                      var tel = '<tr><td>'+tecnico+'</td><td><div><a title="Eliminar" href="'+tecnico+'_'+idOrden+'" class="btn btn-danger"><span class="fa fa-remove"></span></a></div></td></tr>';

                      $("#tbody2").append(tel);


                    });

});


</script>
