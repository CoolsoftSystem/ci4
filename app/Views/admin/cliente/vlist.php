<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Clientes
            <small>Listado de Clientes</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?= base_url('mantenimiento/ccliente/cadd'); ?>" class="btn btn-flat" id="botonVioleta"><span class="fa-solid fa-plus"></span> Agregar Cliente</a>
                    </div>
                </div>
                <?php if (session()->getFlashdata('correcto')) : ?>
                    <div class="alert alert-success">
                        <p><?= session()->getFlashdata('correcto') ?></p>
                    </div>
                <?php endif; ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                      <br>
                        <table id="tablacliente" class="table table-bordered table-hover order-table1">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>CUIT</th>
                                  <th>Nombre</th>
                                  <th>Domicilio</th>
                                  <th>Provincia</th>
                                  <th width="5%">Operaciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($clienteindex)) : ?>
                                  <?php foreach ($clienteindex as $atributos) :?>
                                      <tr>
                                          <td><?= esc($atributos->IdCliente); ?></td>
                                          <td><?= esc($atributos->DniCuit); ?></td>
                                          <td><?= esc($atributos->Nombre); ?></td>
                                          <td><?= esc($atributos->Domicilio); ?></td>
                                          <td><?= esc($atributos->Provincia); ?></td>
                                          <td>
                                              <div class="btn-group">
                                                <a href="<?= base_url('mantenimiento/ccliente/cedit/' . $atributos->IdCliente); ?>" class="btn btn-info" title="Modificar">
                                                    <span class="fa-solid fa-pen"></span>
                                                </a>
                                                <a href="<?= base_url('mantenimiento/ccliente/cdelete/' . $atributos->IdCliente); ?>" class="btn btn-danger btn-remove deleteCliente" title="Eliminar">
                                                        <span class="fa-solid fa-circle-xmark"></span>
                                                </a>
                                              </div>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>
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
    $('#tablacliente').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Cliente",
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
               scrollX: true
          });
});
</script>
