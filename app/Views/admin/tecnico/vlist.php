<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Técnicos
            <small>Listado de Técnicos</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo base_url(); ?>mantenimiento/ctecnico/cadd" class="btn btn-flat" id="botonVioleta"><span class="fa fa-plus"></span> Agregar Técnico</a>
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
                        <table id="tablatecnico" class="table table-bordered table-hover order-table1">
                          <thead>
                              <tr>
                                  <th>DNI</th>
                                  <th>Nombre</th>
                                  <th>Telefono</th>
                                  <th>Operaciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($tecnicoindex)) : ?>
                                  <?php foreach ($tecnicoindex as $atributos) :?>
                                      <tr>
                                          <td ><?php echo $atributos->Dni; ?></td>
                                          <td ><?php echo $atributos->Nombre; ?></td>
                                          <td ><?php echo $atributos->Telefono; ?></td>
                                          <td  >
                                              <div class="btn-group">
                                                <a href="<?php echo base_url(); ?>mantenimiento/ctecnico/cedit/<?php echo $atributos->Dni; ?>" class="btn btn-info" title="Modificar">
                                                    <span class="fa-solid fa-pen"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>mantenimiento/ctecnico/cdelete/<?php echo $atributos->Dni; ?>" class="btn btn-danger btn-remove deleteTecnico" title="Eliminar">
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
    $('#tablatecnico').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Técnico",
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
               }
               
          });
})
</script>
