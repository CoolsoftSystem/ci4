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
                       <?php if($this->session->flashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?php echo base_url();?>mantenimiento/ctecnico/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $tecnicoedit->Dni ?>" name="txtid" id="txtid" >
                            <div class="col-sm-6 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" maxlength="256" value="<?php echo !empty(form_error('txtnombre'))? set_value('txtnombre') : $tecnicoedit->Nombre ?>" class= "form-control"  required>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="dni">DNI</label>
                                <input type="number" id="txtdni" name="txtdni" maxlength="999999999999" value="<?php echo !empty(form_error('txtdni'))? set_value('txtdni') : $tecnicoedit->Dni ?>" class= "form-control" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="telefono">Telefeno</label>
                                <input type="text" id="txttelefono" name="txttelefono" maxlength="50" value="<?php echo !empty(form_error('txttelefono'))? set_value('txttelefono') : $tecnicoedit->Telefono ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-12 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/ctecnico">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
