<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Usuarios
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
                        <form action="<?php echo base_url();?>mantenimiento/cusuario/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $usuarioedit->idUsuario ?>" name="txtidusuario" id="txtidusuario">
                            <input type="hidden" value="<?php echo $usuarioedit->idRol ?>" name="txtidrol" id="txtidrol">
                            <div class=" col-sm-4 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" value="<?php echo !empty(form_error('txtnombre'))? set_value('txtnombre') : $usuarioedit->nombre ?>" class= "form-control"  required>
                            </div>
                            <div class=" col-sm-4 form-group">
                                <label for="email">Email</label>
                                <input type="text" id="txtemail" name="txtemail" value="<?php echo !empty(form_error('txtemail'))? set_value('txtemail') : $usuarioedit->email ?>" class= "form-control"  >
                            </div>

                            <div class="col-sm-4  form-group">
                                <label for="usuario">Privilegios</label>
                                <?$this->select_items->sin_buscador_roles($usuario_select,(!empty($model->idRol))
                               ? $model->idRol : '',	'usuario','1',(!empty($consultar)) ? "disabled ":'required');?>
                            </div>
                            <div class="col-sm-4  form-group">
                                <label for="Contraseña">Contraseña</label>
                                <input type="text" id="txtContraseña" name="txtContraseña" value="<?php echo !empty(form_error('txtContraseña'))? set_value('txtContraseña') : $usuarioedit->pass ?>" class= "form-control" required >
                            </div>

                            <div class="col-sm-12 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/cusuario">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
 <!-- <input type="hidden" value="<?php## echo $usuarioedit->usuario ?>" name="txtnombreviejo" id="txtnombreviejo">