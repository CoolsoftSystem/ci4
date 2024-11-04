<div class="invoice">
                            <div class="header">
                                <div class="logo">
                                    <img src="<?php echo base_url()?>assets/template/dist/img/logo presus.png" width="100">
                                </div>
                                <div class="info">
                                    <p>Elecctrónica BIOS</p>
                                    <p>Cereseto Oeste 156</p>
                                    <p>Capital San Juan</p>
                                    <p>Teléfono: 264-4275852</p>
                                    <p>Correo Electrónico: electronicabios@gmail.com</p>
                                </div>
                                <div class="invoice-data">
                                    <h2>REMITO</h2>
                                    <h4>N°<?php echo $remito->IdRemito; ?></h4>
                                    <h4>Fecha: <?php echo date("d/m/Y", strtotime("$remito->fecha")); ?></h4>
                                </div>
                            </div>   
                            <div class="divider1"></div>
                            <div class="cliente">
                                <div class="info2">
                                        <p>CLIENTE: <?php echo $cliente->Nombre; ?></p>
                                        <p>CUIT: <?php echo $cliente->DniCuit; ?></p>
                                        <p>DOMICILIO: <?php echo $cliente->Domicilio; ?></p>
                                    </div>
                                    <div class="info2">
                                        <p>PROVINCIA: <?php echo $cliente->Provincia; ?></p>
                                        <p>LOCALIDAD: <?php echo $cliente->Localidad; ?></p>                                   
                                        <p>TELEFONO: <?php echo $cliente->Telefono1; ?></p>
                                    </div>                            
                            </div>
                            <div class="divider2"></div>
                            <div class="productos">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>  
                        </div>
<script>
     .header {
    display: flex;
    align-items: center;
    margin-bottom: -300px;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: stretch;
    justify-content: space-around;
    margin-top: 15px;
}
  .logo {
    margin-right: 10px;
    max-width: 35mm; /* Ancho del logo */
  }
  .info {
    font-size: 10px;
  }
  .info p {
    margin: 0 0 0px;
}
.divider2 {
    border-top: 5px solid red;
    margin: 3px 0;
   
  }
  .divider1 {
    border-top: 1px solid #ccc;
    margin: 3px 0;
  }
  .invoice-data {
    text-align: right;
    font-size: 8px;
  }

  .cliente{
    display: flex;
    align-items: left;
    margin-bottom: -500px;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: stretch;
    justify-content: space-around;
    margin-top: -300px !important;
    
  }

  .info2 {
    font-size: 14px;
    padding-top: 10px;
    align-items: left !important;
    margin-left: -60px !important;
  }
  .productos{
    display: flex;
    align-items: left;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: stretch;
    justify-content: space-around;
    margin-top: -500px !important;
  }
 
  /*
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
  */
</script>

                       