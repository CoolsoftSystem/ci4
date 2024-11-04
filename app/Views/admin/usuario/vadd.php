<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Usuarios
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
                        <?php endif; ?>
                        <form action="<?php echo base_url();?>mantenimiento/cusuario/cinsert" method="POST">
                            <div class=" col-sm-4 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control" value="<?php echo set_value('txtnombre') ?>"   required>
                            </div>
                            <div class=" col-sm-4 form-group">
                                <label for="apellido">Email</label>
                                <input type="text" id="txtemail" name="txtemail" class="form-control" value="<?php echo set_value('txtemail') ?>"   >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="usuario_select">Privilegios</label>
                                <? $this->select_items->sin_buscador_priv($usuario_select, '','usuario_select','1', 'required');?>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="Contraseña">Contraseña</label>
                                <input type="text" id="txtContraseña" name="txtContraseña" class="form-control" value="<?php echo set_value('txtContraseña') ?>"  required>
                            </div>

                            <div class="col-sm-12 form-group">
                            <a class="btn btn-default" href="<?php echo base_url();?>mantenimiento/cusuario">Volver</a>
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
