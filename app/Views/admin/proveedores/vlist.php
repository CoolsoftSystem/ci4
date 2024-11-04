<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Proveedores
            <small>Listado de Proveedores</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo base_url(); ?>mantenimiento/cproveedores/cadd" class="btn btn-flat" id="botonVioleta"><span class="fa-solid fa-plus"></span> Agregar Proveedor</a>
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
                        <table id="tablaproveedores" class="table table-bordered table-hover order-table1">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Nombre</th>
                                  <th>Productos</th>
                                  <th>Telefono</th>
                                  <th>Email</th>
                                  <th>Contacto</th>
                                  <th width="5%">Operaciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($proveedoresindex)) : ?>
                                  <?php foreach ($proveedoresindex as $atributos) :?>
                                      <tr>
                                          <td ><?php echo $atributos->IdProveedores; ?></td>
                                          <td ><?php echo $atributos->Nombre; ?></td>
                                          <td ><?php echo $atributos->Producto; ?></td>
                                          <td ><?php echo $atributos->Telefono; ?></td>
                                          <td ><?php echo $atributos->Email; ?></td>
                                          <td ><?php echo $atributos->Contacto; ?></td>
                                          <td  >
                                              <div class="btn-group">
                                                <a href="<?php echo base_url(); ?>mantenimiento/cproveedores/cedit/<?php echo $atributos->IdProveedores; ?>" class="btn btn-info" title="Modificar">
                                                    <span class="fa-solid fa-pen"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>mantenimiento/cproveedores/cdelete/<?php echo $atributos->IdProveedores; ?>" class="btn btn-danger btn-remove deleteProveedor" title="Eliminar">
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
    $('#tablaproveedores').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Proveedores",
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
               scrollX:true
          });
})
</script>
