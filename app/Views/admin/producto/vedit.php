<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Producto
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
                        <form action="<?php echo base_url();?>mantenimiento/cremitos/cupdateProd" method="POST">
                            <input type="hidden" value="<?php echo $productoedit->IdProducto ?>" name="txtid" id="txtid">
                            <div class="col-sm-6 form-group">
                                <label for="producto">Descripción</label>
                                <input type="text" id="txtproducto" name="txtproducto" maxlength="150" value="<?= isset($productoedit->producto) ? $productoedit->producto : '' ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" id="txtcantidad" name="txtcantidad"  value="<?= isset($productoedit->cantidad) ? $productoedit->cantidad : '' ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="numSerie">Numero de Serie</label>
                                <input type="text" id="txtnumSerie" name="txtnumSerie"  value="<?= isset($productoedit->numSerie) ? $productoedit->numSerie : '' ?>" class= "form-control"  >
                            </div>

                            <div class="col-sm-12 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/cremitos/cedit/<?php echo $productoedit->IdRemito; ?>">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
