<div class="content-wrapper">
    <section class="content-header">
        <h1> Usuario
            <small>Listado de Usuarios </small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/cusuario/cadd" class="btn btn-flat" id="botonVioleta"><span class="fa fa-plus"></span> Agregar usuario</a>
                    </div>
                </div>
                <?php if ($this->session->flashdata('correcto')):?>
                            <div class="alert alert-success">
                                <p><?php echo $this->session->flashdata('correcto')?></p>
                            </div>
                        <?php endif; ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    <div class="table-scroll">
                        <table id="example1" class="table table-bordered table-hover" style="overflow-x: auto; width: 100%;">
                            <thead>
                                <tr>
                                   
                                    <th>Nombre </th>
                                    
                                    <th>Privilegios</th>
                                    <th>Operaciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($usuarioindex)):?>
                                <?php foreach ($usuarioindex as $atributos):?>
                                <tr>
                                    
                                    <td><?php echo $atributos->nombre ;?></td>
                                    
                                    <td><?php echo $atributos->nombre_tipo ;?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url();?>mantenimiento/cusuario/cedit/<?php echo $atributos->idUsuario; ?>" class="btn btn-info">
                                                <span class="fa-solid fa-pen"></span>
                                            </a>
                                            <a href="<?php echo base_url();?>mantenimiento/cusuario/cdelete/<?php echo $atributos->idUsuario; ?>" class="btn btn-danger btn-remove deleteUsuario">
                                                <span class="fa-solid fa-circle-xmark"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach?>
                                <?php endif ;?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><font style="vertical-align: inherit;" > <font style="vertical-align: inherit;">x</font></font></span>
                </button>
                <h4 class="modal-title"> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Informacion de la usuario</font></font></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cerrar</font></font> </button>
            </div>
        </div>
    </div>
</div>


