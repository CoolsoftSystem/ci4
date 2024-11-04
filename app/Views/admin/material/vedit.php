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
                       <?php if($this->session->flashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?php echo base_url();?>mantenimiento/cparteorden/cupdateMat" method="POST">
                            <input type="hidden" value="<?php echo $materialedit->IdMat ?>" name="txtid" id="txtid">
                            <div class="col-sm-6 form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" id="txtdescripcion" name="txtdescripcion" maxlength="150" value="<?php echo !empty(form_error('txtdescripcion'))? set_value('txtdescripcion') : $materialedit->Descripcion ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="text" id="txtcantidad" name="txtcantidad"  value="<?php echo !empty(form_error('txtcantidad'))? set_value('txtcantidad') : $materialedit->Cantidad ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="precio">Precio</label>
                                <input type="number" id="txtprecio" name="txtprecio" step=".01" value="<?php echo !empty(form_error('txtprecio'))? set_value('txtprecio') : $materialedit->Precio ?>" class= "form-control"  >
                            </div>

                            <div class="col-sm-12 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/cparteorden/cedit/<?php echo $materialedit->IdParte; ?>">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
