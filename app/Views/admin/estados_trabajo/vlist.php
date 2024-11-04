<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Estados de Trabajo
            
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                            <?php if ($this->session->flashdata('correcto')) : ?>
                                <div class="alert alert-success">
                                    <p><?php echo $this->session->flashdata('correcto') ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-12" style="padding-left:0">
                                <h3>Buscar por Fecha</h3>
                            </div>

                            <div class="col-md-12" style="padding-left:0">
                                    <div class="row">
                                        <div class="input-daterange">
                                            <div class="col-md-4">
                                                <input type="date" name="start_date" id="start_date" class="form-control" />
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <input type="date" name="end_date" id="end_date" class="form-control" />
                                            </div>      
                                        </div>
                                 </div>
                             </div> 
                             <br>
                             <div class="col-md-12">
                            </div>
                             
                                     
                       
                
                
                       
                      
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="tablaordenc" class="table table-bordered table-hover order-table1">
                                    <thead>
                                        <tr>
                                            <th>Fecha Visita</th>

                                            <th>N° Orden</th>

                                            <th>Cliente</th>
                                            
                                            <th>Detalle Trabajo</th>

                                            <th>Estado</th>
                                            
                                            <th>Técnicos</th>

                                            <th>Monto S/IVA</th>
                                            
                                            <th>Materiales S/IVA</th>
                                        
                                            <th>Ganancia</th>

                                            <th>HH Invertidas</th>

                                            <th>Rentabilidad</th>

                                            <th>N° factura</th>

                                            <th>Fecha Factura</th>

                                            <th>Estado pago</th>

                                            <th>Fecha pago</th>

                                            <th>Demora en pago</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($ordenindex)) : ?>
                                            <?php foreach ($ordenindex as $atributos) :?>
                                                <tr>
                                                    
                                                    <td align="center" width="10%"><?php if ($atributos->Fecha != "-") 
                                                                        {echo substr("$atributos->Fecha", 0, 10);}
                                                                        else{echo '-' ; };?></td>
                                                    <td align="center" width="3%"><?php echo $atributos->IdOrden; ?></td>
                                                    <td width="15%"><?php echo $atributos->Nombre; ?></td>
                                                    <td width="24%"><?php echo $atributos->TareaDesarrollar; ?></td>
                                                    <td width="10%"><?php if ($atributos->Completa == '1')
                                                            { echo 'Completada';}elseif($atributos->Estado == 0)
                                                            { echo 'Pendiente';}elseif($atributos->Estado == 1)
                                                            { echo 'Recibida';}elseif($atributos->Estado == 2)
                                                            { echo 'En Curso';}elseif($atributos->Estado == 3)
                                                            { echo 'Finalizada';}else{ echo 'Sin tareas';} ; ?></td>
                                                    <td width="15%"><?php echo $atributos->TEC; ?></td>
                                                    <td width="8%">$<?php echo number_format($atributos->Precio, 2); ?></td>
                                                    <td width="8%">$<?php echo number_format($atributos->Gastos, 2); ?></td>
                                                    <td width="8%">$<?php echo  number_format($atributos->Ganancia, 2); ?></td>
                                                    <td width="8%"><?php echo number_format($atributos->HH, 2);?></td>
                                                    <td width="8%"><?php echo number_format($atributos->rentabilidad,2); ?>%</td>
                                                    <td align="center" width="8%"><?php if ($atributos->N_factura != null)
                                                            { echo $atributos->N_factura;}else{ echo '-';} ; ?></td>
                                                    <td align="center" width="8%"><?php if ($atributos->fecha_factura != "-")
                                                            { echo date("d/m/Y", strtotime("$atributos->fecha_factura"));}else{ echo '-';} ; ?></td>
                                                    <td align="center" width="8%"><?php if ($atributos->estado_pago != null)
                                                            { echo ($atributos->estado_pago);}else{ echo '-';} ; ?></td>
                                                    <td align="center" width="8%"><?php if ($atributos->fecha_pago != "-")
                                                            { echo date("d/m/Y", strtotime("$atributos->fecha_pago"));}else{ echo '-';} ; ?></td>
                                                    <td align="center" width="8%"><?php echo $atributos->demora; ?></td>
                                                    
                                                </tr> 
                                            <?php endforeach ?>
                                        <?php endif; ?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            
                    </div> 
                </div>
            </div>
        </div>
    </section>
</div>
<style>
/*estilo titulos tabla*/ 
.table thead, .table tfoot{
        background-color: #337ab7;
        color:azure;
    }
/*estilo de boton columnas*/ 
.dt-button.buttons-columnVisibility {
              background: #3c8dbc !important;
              color: white !important;
             
              
           }
        .dt-button.buttons-columnVisibility.active {
              background: white !important;
              color: black !important;
              border-color: #3c8dbc !important;
              
           }


           div.dt-buttons{
            /*position:relative;*/
            margin-top: 20px;
            margin-bottom: 10px;
            float:right;
           }

           div.dataTables_wrapper div.dataTables_length label{
            /*position:relative;
            position:relative;*/
            margin-top: 10px;
           }
           .dataTables_wrapper .dataTables_length {
            margin-top: 30px;
            }

           div.dataTables_wrapper div.dataTables_info{
            position:absolute;
            bottom: 0;
            /*float:right;*/
           }
           div.dataTables_wrapper div.dataTables_filter {
            top: 20px;
            right: 10px;
            float:left;
            position: relative;
            }
            .dataTables_wrapper .dataTables_paginate .paginate_button {
    
               padding: 0em; 
            }   
           
</style>

<script type="text/javascript">


$(document).ready(function () {
var table =  $('#tablaordenc').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Órdenes",
                   "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                   "infoEmpty": "No existen registros",
                   "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                   "search": "Buscar:",
                   "bStateSave": true,
                   "paginate": {
                       "first": "Primero",
                       "last": "Último",
                       "next": "Siguiente",
                       "previous": "Anterior"
                   },
               },
               
            
               "order": [[ 0, "desc" ]],
               responsive: "true",
               scrollX:true,
               bStateSave: true,
               dom: '<"dt-buttons"Bf><"clear">lirtp',
               
               buttons: [ 
                {
                    extend :'colvis',
                    text:"Columnas",
                    className: 'btn btn-primary',
                    columnText : function ( dt, idx, title ) { return (idx+1)+': '+title; }
                    
                   
                    
                },
                {
                    extend: 'excelHtml5',
                    exportOptions:{
                            columns: ':visible'
                    },
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions:{
                            columns:':visible'
                    },
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    exportOptions:{
                            columns:':visible'
                    },
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                    
                }
               
            ],
            'columnDefs': [
       { targets: [10,11,12,13,14], visible: false},
       {searchable: false, targets: [5,6,7,8,9,10,11,12,13,14]  }
       
    ],
            
           
            fnDrawCallback: function () {
       $('.buttons-colvis').attr("id", "showHideColumnButton").removeClass('dt-buttonbuttons-collection buttons-colvis');}
            
       
                     
                    
          });
          //table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
          $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = $('#start_date').val();
        var max = $('#end_date').val();
        var date_pursached =  data[0] || 0; // use data for the date column
 
         if (min == "" && max == "") { return true; }
         if (min == "" && date_pursached <= max) { return true;}
         if(max == "" && date_pursached >= min) {return true;}
         if (date_pursached <= max && date_pursached >= min) { return true; }
         return false;
    }
);
 
$(document).ready(function() {
    var table = $('#tablaordenc').DataTable();

     
    // Event listener to the two range filtering inputs to redraw on input
    $('#start_date, #end_date').change( function() {
        table.draw();
    } );

} );

   
    


          
        
});


 

/*
//creacion de color en celda segun contenido
"createdRow":function(row,data,index){
                if(data[0]=='-'){
                    $('td',row).eq(0).css({
                        'background-color':'#ff5252',
                        'color':'white'
                    })
                }
                
            },  */

            /*{
        "targets": [10,11,12,13,14],
        "createdCell": function (td, cellData, rowData, row, col) {
      if ( cellData == '-' ) {
        $(td).css('background-color','#ff5252');
        $(td).css('color','white');
      }else{
        $(td).css('background-color','#00b347');
        $(td).css('color','white');
      }
    }
    } */

/*<div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                          <h2>Filtros</h2>
                        </div>
                      <form action="</*?php echo base_url(); ?>" method="POST">
                                <div class="col-sm-2 form-group">
                                  <label for="fechaini">Inicio</label>
                                  <input type="date" id="txtfechaini" name="txtfechaini" class="form-control" min="2020-01-01" max="2100-12-31" value="</**?php echo set_value('txtfechaini') ?>">
                                </div>
                                <div class="col-sm-2 form-group">
                                  <label for="fechafin">Fin</label>
                                  <input type="date" id="txtfechafin" name="txtfechafin" class="form-control" min="2020-01-01" max="2100-12-31" value="</**?php echo set_value('txtfechafin') ?>">
                                </div>
                                <br>
                                <div class="col-sm-10 form-group">
                                    <button type="submit" class="btn btn-success">Buscar</button>
                                </div>
                            </form>*/ 


                            /* */

</script>
