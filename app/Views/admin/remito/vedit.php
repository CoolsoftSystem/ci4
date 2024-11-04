<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Remito N° <?php echo $remitoedit->IdRemito ?>
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
                        <form action="<?php echo base_url();?>mantenimiento/cremitos/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $remitoedit->IdRemito?>" name="txtIdRemito" id="txtIdRemito">
                            <div class="col-md-5 form-group">
                              <label for="cliente">Cliente&nbsp;&nbsp; (*)</label>
                							<? $this->select_items->sin_buscador2($cliente_select,(!empty($model->IdCliente))
                               ? $model->IdCliente : '',	'cliente','1',(!empty($consultar)) ? "disabled ":'required');?>
                			<input id="cliente_hidden" name="cliente_hidden" type="hidden" >
                			</div>
                            <div class="col-sm-3 form-group">
                                <label for="fecha">Fecha de Recepción</label>
                                <input type="text" id="txtfecha" name="txtfecha"  min="2020-01-01" max="2100-12-31" value="<?php echo !empty(form_error('txtfecha'))? set_value('txtfecha') :  date("d-m-Y", strtotime("$remitoedit->fecha"));?>" class= "form-control"   >
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="observaciones">OBSERVACIONES</label>
                                <input type="text" id="txtobservaciones" name="txtobservaciones" maxlength="200" value="<?php echo !empty(form_error('txtobservaciones'))? set_value('txtobservaciones') : $remitoedit->observaciones ?>" class= "form-control"  >
                            </div>
                        
                            <div class="col-sm-6 form-group">
                                <a class="btn btn-info" href="<?php echo base_url();?>mantenimiento/cremitos">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-11">
                                <form action="<?php echo base_url();?>mantenimiento/cremitos/cupdateProducto" method="POST">
                                    <div class="col-sm-12 form-group">
                                    <h3>Detalle Productos</h3>
                                    </div>
                                    <input type="hidden" value="<?php echo $remitoedit->IdRemito ?>" name="txtIdRemito" id="txtIdRemito">
                                
                                    <div class="col-sm-5 form-group">
                                        <label for="producto">Producto</label>
                                        <input type="text" id="txtproducto" name="txtproducto" class="form-control"  value="<?php echo set_value('txtproducto') ?>" required>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="number" id="txtcantidad" name="txtcantidad" class="form-control" value="<?php echo set_value('txtcantidad') ?>" >
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="numSerie">Numero de Serie</label>
                                        <input type="text" id="txtnumSerie" name="txtnumSerie" class="form-control" value="<?php echo set_value('txtnumSerie') ?>" >
                                    </div>
                                    <div class="col-sm-1">
                                        <br>
                                        <button class="btn btn-primary" type="button" id="agregarProducto"><span class="fa fa-plus" aria-hidden="true" ></span> Agregar </button>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                            <table id="example1" class="table table-bordered table-hover order-table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Numero de Serie</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='tbody1'>
                                                    <?php if (!empty($producto)) : ?>
                                                        <?php foreach ($producto as $atributos) : ?>
                                                            <tr>
                                                                <td><?php echo $atributos->IdProducto; ?></td>
                                                                <td style="text-align: justify; display: inline-block;"><?php echo $atributos->producto; ?></td>
                                                                <td><?php echo $atributos->cantidad; ?></td>
                                                                <td><?php echo $atributos->numSerie; ?></td>
                                                                <?php $data = $atributos->IdRemito; ?>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a title="Modificar" href="<?php echo base_url(); ?>mantenimiento/cremitos/ceditProd/<?php echo $atributos->IdProducto; ?>" class="btn btn-info ">
                                                                            <span class="fa fa-pencil"></span>
                                                                        </a>
                                                                        <a title="Eliminar" href="<?php echo base_url(); ?>mantenimiento/cremitos/cdeleteProd/<?php echo $atributos->IdProducto; ?>" class="btn btn-danger btn-remove deleteProductoTarea">
                                                                            <span class="fa fa-remove"></span>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">

$(document).ready(function(){

    var base_url= "<?php echo base_url();?>";
  $('#agregarProducto').on('click',function(){
        var idRemito =$('#txtIdRemito').val();
        var producto =$('#txtproducto').val();
        var cant =$('#txtcantidad').val();
        var numSerie =$('#txtnumSerie').val();
    
      
        if((producto=='') || (cant=='') || (numSerie=='')  ){
            
            window.location.href=base_url+'/mantenimiento/cremitos/cError/'+idRemito;
        }else{

        $('#txtproducto').val('');
        $('#txtcantidad').val('');
        $('#txtnumSerie').val('');
        
       
                $.ajax( {
                                    method:'POST',
                                    url:'<?php echo base_url(); ?>' + 'mantenimiento/cremitos/addProducto',
                                    dataType:'html',
                                    data:{producto:producto,idRemito:idRemito,cant:cant, numSerie:numSerie}})
                                   
                                    .done(function(r) {
                                        //alert(r);
                                    if(r==0){
                                        //alert("entra al if");
                                        window.location.href=base_url+'/mantenimiento/cremitos/cErrorCantidad/'+idRemito;
                                    }else if(r==1) {
                                        //alert("no entra al if");
                                        window.location.href=base_url+'/mantenimiento/cremitos/cedit/'+idRemito;
                                            //$("#tbody1").append(r['linksa']);
                                    }
                                        
                                    });

        }

        });
    })
</script>
