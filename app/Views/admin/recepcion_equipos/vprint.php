<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
        <h1>
            Orden de Recepción de Equipos
            
        </h1>
                                       
        </div>
    </section>
    <section class="content" id="cuerpo">
   
        <div class="box box-solid" style="margin-top: 1px;">
       
            <div class="box-body">
            <div class="col-sm-3 form-group" id="botones" style="margin-left: -85px;">
                                <a class="btn btn-info" style="margin-bottom: 10px; margin-rigth: 10px;" href="<?php echo base_url();?>mantenimiento/cequipos">Volver</a>
                                <button id="printButton" style="margin-bottom: 10px; margin-rigth: 10px;" class="btn btn-success">Imprimir</button>
                            </div>
                <div class="row" id="datos">
                    <div class="col-md-12">
                    
                    <div class="invoice">
                    
                        <div class="header">
                          <div class="logo">
                          <img src="<?php echo base_url()?>assets/template/dist/img/logo presus.png" width="100">
                          </div>
                          <div class="info">
                            <p>Elecctrónica BIOS</p>
                            <p>Monteagudo 788 Este Villa Mallea</p>
                            <p>Capital San Juan</p>
                            <p>Teléfono: 4212673</p>
                            <p>Correo Electrónico: electronicabios@gmail.com</p>
                          </div>
                         
                        
                                    <div class="invoice-data">
                                        <h3>ORDEN RECEPCIÓN</h3>
                                            <h4>N°<?php echo $equiposindex->num_orden; ?></h4>
                                            <h4>Fecha: <?php echo date("d/m/Y", strtotime("$equiposindex->fecha")); ?></h4>
                                    </div>
                                </div>
                                
                        <div class="divider"></div>
                        
                        <div class="customer-equipment">
                          <div class="customer">
                          <h3>Datos del Cliente</h3>
                                    <p>Cliente: <?php echo $model->Nombre; ?></p>
                                    <p>Domicilio: <?php echo $model->Domicilio." ".$model->Localidad." ".$model->Provincia; ?></p>
                                    <p>Teléfonos: Mantenimiento: <?php if($model->tel_mantenimiento) {echo $model->tel_mantenimiento; }else{ echo "-";}; ?> &nbsp Ventas: <?php if($model->tel_venta) { echo $model->tel_venta;}else{ echo "-";} ;?> &nbsp Comercial: <?php if($model->tel_comercial) {echo $model->tel_comercial;} else{ echo "-";} ; ?> </p>
                                    <p>E-mails: <?php if($model->mail_mant) {echo $model->mail_mant; }else{ echo "";}; ?> &nbsp <?php if($model->mail_vta) { echo $model->mail_vta;}else{ echo "";} ;?> &nbsp <?php if($model->mail_comercial) {echo $model->mail_comercial;} else{ echo "";} ; ?> </p>
                                    <p>Nombres: <?php if($model->nya_mant) {echo $model->nya_mant; }else{ echo "";}; ?> &nbsp <?php if($model->nya_vta) { echo $model->nya_vta;}else{ echo "";} ;?> &nbsp <?php if($model->nya_cial) {echo $model->nya_cial;} else{ echo "";} ; ?> </p>
                                  </div>
                                <div class="equipment">
                                    <h3>Datos del equipo</h3>
                                    <p>Marca: <?php echo $equiposindex->marca;?> </p>
                                    <p>Modelo: <?php echo $equiposindex->modelo; ?></p>
                                    <p>N° de Serie: <?php echo $equiposindex->num_serie; ?></p>
                                    <p>Sector: <?php echo $equiposindex->sector; ?></p>
                                    <p>Accesorios: <?php echo $equiposindex->accesorios; ?></p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="description">
                                <h3>Descripción de Avería:</h3>
                                
                                <p><?php echo $equiposindex->descripcion; ?></p>
                                
                                
                            </div>
                            <div class="signatures">
                            <div class="signature">
                                <h3>Firma Cliente</h3>
                                    <br>
                                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                                </div>
                                <div class="signature">
                                    <h3>Firma Técnico</h3>
                                    <br>
                                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                                </div>
                         </div>  
                      </div>
                      </div>
                    </div>
                    
                    
                </div>

            </div>    
        </div>
    </section>
</div>

<script>
    // Función para imprimir la factura
    function printInvoice() {
      const printButton = document.getElementById('printButton');
      printButton.style.display = 'none'; // Ocultar el botón antes de imprimir

      window.print();

      printButton.style.display = 'block'; // Mostrar el botón después de imprimir
    }

    // Asociar la función de impresión al botón
    const printButton = document.getElementById('printButton');
    printButton.addEventListener('click', printInvoice);
  </script>
<style>
  .invoice {
    width: 148mm; /* Ancho A5 */
    height: 210mm; /* Alto A5 */
    margin: auto;
    padding: 5px;
    border: 1px solid #ccc;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .header {
    display: flex;
    align-items: center;
    margin-bottom: -93px;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: stretch;
    justify-content: space-around;
}
  .logo {
    margin-right: 10px;
    max-width: 30mm; /* Ancho del logo */
  }
  .info {
    font-size: 10px;
  }
  .info p {
    margin: 0 0 0px;
}
  .divider {
    border-top: 1px solid #ccc;
    margin: 3px 0;
  }
  .invoice-data {
    text-align: right;
    font-size: 8px;
  }
  .customer-equipment {
    justify-content: space-between;
    margin-top: -106px;
    margin-bottom: -115px;
  }
  .customer, .equipment {
    flex-basis: calc(50% - 5px);
    padding: 5px;
  }
  .customer h3, .equipment h3 {
    margin-top: 0;
  }
  .description {
    
    padding: 5px;
    margin-top: -114px;
  }
  .description h3 {
    margin-top: 0;
  }
  .signatures {
    display: flex;
    margin-top: 10px;
  }
  .signature {
    flex-basis: calc(50% - 5px);
    border-top: 1px solid #ccc;
    padding-top: 10px;
  }
  .signature h3 {
    margin-top: 0;
  }
  .signature p {
    margin-bottom: 5px;
  }

  @media print {
  body {
    margin: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 0;
    font-family: Arial, sans-serif;
    font-size: 10px;
  }

  .main-footer {
    display: none;
  }

  .box box-solid{
    display: none;
  }

  #botones{
    display: none;
  }

  .invoice {
    width: 148mm;
    height: 208mm;
    margin: 0;
    padding: 10px;
    border: 1px solid #ccc;
    box-shadow: none;
  }

  /* ... otros estilos para la impresión ... */
}
</style>

