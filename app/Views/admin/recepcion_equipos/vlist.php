<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Orden de Recepción de Equipos
            <small>Listado</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo base_url(); ?>mantenimiento/cequipos/cadd" class="btn btn-flat" id="botonVioleta"><span class="fa-solid fa-plus"></span> Nueva Orden</a>
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
                        <table id="tablaequipos" class="table table-bordered table-hover order-table1">
                          <thead>
                              <tr>
                                  <th width="3%">Orden N°</th>
                                  <th width="7%">Fecha</th>
                                  <th width="15%">Cliente</th>
                                  <th width="20%">Descripcion</th>
                                  <th width="10%">Operaciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($equipoindex)) : ?>
                                  <?php foreach ($equipoindex as $atributos) :?>
                                      <tr>
                                          <td width="3%"><?php echo $atributos->num_orden; ?></td>
                                          <td width="7%"><?php echo date("d/m/Y", strtotime($atributos->fecha)); ?></td>
                                          <td width="15%"><?php echo $atributos->Nombre; ?></td>
                                          <td width="20%"><?php echo $atributos->descripcion; ?></td>
                                          <td  width="10%">
                                              <div class="btn-group">
                                              <a href="<?php echo base_url(); ?>mantenimiento/cequipos/print/<?php echo $atributos->num_orden; ?>" class="btn btn-warning" title="Ver">
                                                      <span class="fa fa-eye"></span>
                                                  </a>
                                                <a href="<?php echo base_url(); ?>mantenimiento/cequipos/cedit/<?php echo $atributos->num_orden; ?>" class="btn btn-info" title="Modificar">
                                                    <span class="fa-solid fa-pen"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>mantenimiento/cequipos/cdelete/<?php echo $atributos->num_orden; ?>" class="btn btn-danger btn-remove deleteEquipos" title="Eliminar">
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

<style>
.dataTables_wrapper.no-footer div.dataTables_scrollHead table.dataTable, .dataTables_wrapper.no-footer div.dataTables_scrollBody>table{
 margin-left: -3px;
}
</style>

<script type="text/javascript">


$(document).ready(function () {
    $('#tablaequipos').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Orden",
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
               scrollX:true
          });
})
</script>
