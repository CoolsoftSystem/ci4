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
                       <?php if($this->session->flashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?php echo base_url();?>mantenimiento/cequipos/cupdate" method="POST">
                        <input type="hidden" value="<?php echo $equiposedit->num_orden ?>" name="txtnumorden" id="txtnumorden"> 
                        <div class="col-sm-2 form-group">
                                  <label for="fecha">Fecha</label>
                                  <input type="string" id="txtfecha" name="txtfecha" class="form-control" min="2020-01-01" max="2100-12-31" value="<?php echo !empty(form_error('txtfecha'))? set_value('txtfecha') :  date("d/m/Y", strtotime("$equiposedit->fecha"));?>" >
                                </div>
                                <div class="col-md-5 form-group">
                              <label for="cliente">Cliente&nbsp;&nbsp; (*)</label>
                							<? $this->select_items->sin_buscador5($cliente_select,(!empty($model->IdCliente))
                               ? $model->IdCliente : '',	'cliente','1',(!empty($consultar)) ? "disabled ":'required');?>
                			<input id="cliente_hidden" name="cliente_hidden" type="hidden" >
                			</div>

                                <div class="col-sm-6 form-group">
                                    <label for="marca">Marca</label>
                                    <input type="text" id="txtmarca" name="txtmarca"maxlength="1000" class="form-control" value="<?php echo !empty(form_error('txtmarca'))? set_value('txtmarca') : $equiposedit->marca ?>">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="modelo">Modelo</label>
                                    <input type="text" id="txtmodelo" name="txtmodelo" maxlength="950"class="form-control" value="<?php echo !empty(form_error('txtmodelo'))? set_value('txtmodelo') : $equiposedit->modelo ?>">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="serie">Número serie</label>
                                    <input type="text" id="txtserie" name="txtserie" maxlength="950"class="form-control" value="<?php echo !empty(form_error('txtserie'))? set_value('txtserie') : $equiposedit->num_serie ?>">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="sector">Sector</label>
                                    <input type="text" id="txtsector" name="txtsector" maxlength="950"class="form-control" value="<?php echo !empty(form_error('txtsector'))? set_value('txtsector') : $equiposedit->sector ?>"  >
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="accesorios">Accesorios</label>
                                    <input type="text" id="txtaccesorios" name="txtaccesorios" maxlength="950"class="form-control" value="<?php echo !empty(form_error('txtaccesorios'))? set_value('txtaccesorios') : $equiposedit->accesorios ?>"  >
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" id="txtdescripcion" name="txtdescripcion" maxlength="950"class="form-control" value="<?php echo !empty(form_error('txtdescripcion'))? set_value('txtdescripcion') : $equiposedit->descripcion ?>">
                                </div>
                            <div class="col-sm-6 form-group">
                                <a class="btn btn-info" href="<?php echo base_url();?>mantenimiento/cequipos">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
