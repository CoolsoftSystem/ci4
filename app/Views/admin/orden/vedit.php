<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Orden <?php echo $ordenedit->IdOrden ?>
            <small>Editar</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
               
               <div class="row">
                   <div class="col-md-12">
                       <?php if($session->getFlashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $session->getFlashdata('error') ?> </p>
                        </div>
                        <?php endif  ;?>
                        
                        <form action="<?php echo base_url('mantenimiento/corden/cupdate'); ?>" method="POST">
  <input type="hidden" value="<?= $ordenedit->IdOrden ?>" name="txtidorden" id="txtidorden">
  <div class="col-sm-12 form-group">
    <h2>Datos Orden</h2>
  </div>
  <div class="col-sm-3 form-group">
    <label for="fecha">Fecha de Recepción</label>
    <input type="text" id="txtfecha" name="txtfecha" class="form-control" 
    value="<?= date('d-m-Y', strtotime($ordenedit->FechaRecepcion))?>"
    min="2020-01-01" max="2100-12-31">
  </div>
  <div class="col-sm-3 form-group">
    <label for="precio">Precio</label>
    <input type="number" id="txtprecio" name="txtprecio" step="0.01" 
      value="<?= $ordenedit->Precio ?? '' ?>" 
      class="form-control">
  </div>
  <div class="col-md-4 form-group">
    <label>Completa</label><br>
    <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" 
      <?= (!empty($ordenedit->Completada) && $ordenedit->Completada == "1") ? 'checked' : '' ?> 
      <?= !empty($consultar) ? "disabled" : "";?> 
      <?= !isset($ordenedit->Completada) ? 'checked' : '' ?> />
    <span class="checkmark"></span>
  </div>
  <div class="col-sm-12 form-group">
    <label for="tarea">Tarea</label>
    <input type="text" id="txttarea" name="txttarea" maxlength="1000" 
      value="<?= $ordenedit->TareaDesarrollar ?? '' ?>" 
      class="form-control" required>
  </div>
  <div class="col-md-5 form-group">
    <label for="cliente">Cliente&nbsp;&nbsp; (*)</label>
    <?php 
        echo $select_items->sin_buscador2($cliente_select, $ordenedit->IdCliente, 'cliente', '1', !empty($consultar) ? 'disabled' : 'required');
    ?>
    <input id="cliente_hidden" name="cliente_hidden" type="hidden">
  </div>
  <div class="col-sm-12 form-group">
    <label for="obser">OBSERVACIONES</label>
    <input type="text" id="txtobser" name="txtobser" maxlength="1000" 
      value="<?= $ordenedit->observaciones ?? '' ?>" 
      class="form-control">
  </div>
  <div class="col-sm-12 form-group">
    <a class="btn btn-info" href="<?= base_url('mantenimiento/corden'); ?>">Volver</a>
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>

<div class="col-sm-12 form-group" style="margin-top: 30px;">
  <b>Datos Factura</b>
  <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()">
</div>
<div id="content" style="display: none;">
  <form action="<?= base_url('mantenimiento/corden/cupdatefact'); ?>" method="POST">
    <input type="hidden" value="<?= $ordenedit->IdOrden ?>" name="txtidorden" id="txtidorden">
    <input type="hidden" value="<?= $ordenedit->N_factura ?>" name="txtid" id="txtid">  
    <div class="col-sm-12 form-group">
      <h2>Datos de Facturación</h2>
    </div>
    <div class="col-sm-3 form-group">
      <label for="numFactura">N° Factura</label>
      <input type="text" id="txtnumFactura" name="txtnumFactura" class="form-control" 
        value="<?= $ordenedit->N_factura ?? '' ?>">
    </div>
    <div class="col-sm-3 form-group">
      <label for="fechaFactura">Fecha Factura <b>(dd/mm/aaaa)</b></label>
      <input type="text" id="txtfechaFactura" name="txtfechaFactura" class="form-control" 
        value="<?= isset($ordenedit->fecha_factura) && $ordenedit->fecha_factura !== '0000-00-00 00:00:00' ? date("d-m-Y", strtotime($ordenedit->fecha_factura)) : '' ?>">
    </div>
    <div class="col-sm-3 form-group">
      <label for="fechaPago">Fecha Pago <b>(dd/mm/aaaa)</b></label>
      <input type="text" id="txtfechaPago" name="txtfechaPago" class="form-control" 
        value="<?= isset($ordenedit->fecha_pago) && $ordenedit->fecha_pago !== '0000-00-00 00:00:00' ? date("d-m-Y", strtotime($ordenedit->fecha_pago)) : '' ?>">
    </div>
    <div class="col-sm-3 form-group">
      <label for="Pago">Estado del Pago</label>
      <input type="text" id="txtpago" name="txtpago" maxlength="1000" 
        value="<?= $ordenedit->estado_pago ?? '' ?>" 
        class="form-control">
    </div>
    <div class="col-sm-12 form-group">
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
  </form>
</div>

                        </div>
                    </div> 
               </div>
            </div>
        </div>
    </section>
</div>

<style>
    input[type="radio"], input[type="checkbox"] {
    
    margin-left: 20px;
    
}
    </style>

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
