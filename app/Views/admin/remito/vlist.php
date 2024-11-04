<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Remitos
            <small>Listado de Remitos</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo base_url(); ?>mantenimiento/cremitos/cadd" class="btn btn-flat" id="botonVioleta"><span class="fa fa-plus"></span> Agregar remito</a>
                    </div>
                </div>
                <?php if ($this->session->flashdata('correcto')) : ?>
                    <div class="alert alert-success">
                        <p><?php echo $this->session->flashdata('correcto') ?></p>
                    </div>
                <?php endif; ?>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <br>
                        <table id="tablaremito" class="table table-bordered table-hover order-table2">
                            <thead>
                                <tr>
                                  <th width="5%">N° remito</th>
                                  <th width="15%">Fecha</th>
                                  <th width="20%">Cliente</th>
                                  <th width="40%">Observaciones</th>
                                  <th width="20%">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($remitoindex)) : ?>
                                    <?php foreach ($remitoindex as $atributos) :?>
                                        <tr>
                                          <td width="5%"><?php echo $atributos->IdRemito; ?></td>
                                          <td width="15%"><?php echo date("d/m/Y", strtotime("$atributos->fecha")); ?></td>
                                          <td width="20%"><?php echo $atributos->Nombre; ?></td>
                                          <td width="40%"><?php echo $atributos->observaciones; ?></td>
                                          <td width="20%" >
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremitos/cprint/<?php echo $atributos->IdRemito; ?>" class="btn btn-warning" title="Ver">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremitos/cedit/<?php echo $atributos->IdRemito; ?>" class="btn btn-info" title="Modificar">
                                                        <span class="fa-solid fa-pen"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremitos/cdelete/<?php echo $atributos->IdRemito; ?>" class="btn btn-danger btn-remove deleteremitoCompleta" title="Eliminar">
                                                        <span class="fa-solid fa-circle-xmark"></span>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">


$(document).ready(function () {
  var table =  $('#tablaremito').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Remitos ",
                   "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                   "infoEmpty": "No existen registros",
                   "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                   "search": "Buscar:",
                   "paginate": {
                       "first": "Primero",
                       "last": "Último",
                       "next": "Siguiente",
                       "previous": "Anterior"
                   },
               },
               "bStateSave": true,
               scrollX:true,
               "order": [[ 0, "desc" ]]
          });
          
});
</script>
