<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cliente
            <small>Editar</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <p><?= session()->getFlashdata('error') ?></p>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url('mantenimiento/ccliente/cupdate') ?>" method="POST">
    <input type="hidden" value="<?= $clienteedit->IdCliente ?>" name="txtidcliente" id="txtidcliente">
    <input type="hidden" value="<?= $clienteedit->DniCuit ?>" name="txtcuitold" id="txtcuitold">
    
    <div class="form-group col-sm-2">
        <label for="cuit">CUIT</label>
        <input type="number" id="cuit" name="txtcuitnew" value="<?= $clienteedit->DniCuit ?>" class="form-control" required maxlength="11" min="0" title="Debe contener entre 11 dígitos">
    </div>

    <div class="form-group col-sm-6">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="txtnombre" maxlength="256" value="<?= $clienteedit->Nombre ?>" class="form-control" required>
    </div>

    <div class="form-group col-sm-5">
        <label for="iva">I.V.A</label>
        <input type="text" id="iva" name="txtiva" maxlength="100" value="<?= $clienteedit->IVA ?>" class="form-control">
    </div>

    <div class="form-group col-sm-5">
        <label for="localidad">Localidad</label>
        <input type="text" id="localidad" name="txtlocalidad" maxlength="100" value="<?= $clienteedit->Localidad ?>" class="form-control">
    </div>

    <div class="form-group col-sm-6">
        <label for="domicilio">Domicilio</label>
        <input type="text" id="domicilio" name="txtdomicilio" maxlength="1000" value="<?= $clienteedit->Domicilio ?>" class="form-control">
    </div>

    <div class="form-group col-sm-6">
        <label for="provincia">Provincia</label>
        <input type="text" id="provincia" name="txtprovincia" maxlength="50" value="<?= $clienteedit->Provincia ?>" class="form-control">
    </div>

    <!-- Teléfonos -->
    <div class="form-group col-sm-4">
        <label for="tel_mant">Teléfono Mantenimiento</label>
        <input type="tel" id="tel_mant" name="txtmant" value="<?= $clienteedit->tel_mantenimiento ?>" class="form-control" pattern="\d{7,}" title="Debe ser un número válido">
    </div>

    <div class="form-group col-sm-4">
        <label for="tel_ventas">Teléfono Ventas</label>
        <input type="tel" id="tel_ventas" name="txtventas" value="<?= $clienteedit->tel_venta ?>" class="form-control" pattern="\d{7,}">
    </div>

    <div class="form-group col-sm-4">
        <label for="tel_comercial">Teléfono Comercial</label>
        <input type="tel" id="tel_comercial" name="txtcomercial" value="<?= $clienteedit->tel_comercial ?>" class="form-control" pattern="\d{7,}">
    </div>

    <!-- Correos -->
    <div class="form-group col-sm-4">
        <label for="mail_mant">Mail Mantenimiento</label>
        <input type="email" id="mail_mant" name="txtmmant" value="<?= $clienteedit->mail_mant ?>" class="form-control">
    </div>

    <div class="form-group col-sm-4">
        <label for="mail_vta">Mail Ventas</label>
        <input type="email" id="mail_vta" name="txtmvta" value="<?= $clienteedit->mail_vta ?>" class="form-control">
    </div>

    <div class="form-group col-sm-4">
        <label for="mail_comercial">Mail Comercial</label>
        <input type="email" id="mail_comercial" name="txtmcial" value="<?= $clienteedit->mail_comercial ?>" class="form-control">
    </div>

    <!-- Nombre y Apellido -->
    <div class="form-group col-sm-4">
        <label for="nya_mant">Nombre y Apellido (Mantenimiento)</label>
        <input type="text" id="nya_mant" name="txtnmant" value="<?= $clienteedit->nya_mant ?>" class="form-control">
    </div>

    <div class="form-group col-sm-4">
        <label for="nya_vta">Nombre y Apellido (Ventas)</label>
        <input type="text" id="nya_vta" name="txtnvta" value="<?= $clienteedit->nya_vta ?>" class="form-control">
    </div>

    <div class="form-group col-sm-4">
        <label for="nya_cial">Nombre y Apellido (Comercial)</label>
        <input type="text" id="nya_cial" name="txtncial" value="<?= $clienteedit->nya_cial ?>" class="form-control">
    </div>

    <div class="form-group col-sm-12">
        <a href="<?= base_url('mantenimiento/ccliente') ?>" class="btn btn-info">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
