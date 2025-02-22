<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar" id="menu">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            
            <li class="treeview">
                <a href="#">
                <?php if ($roles->cliente == "1" || $roles->tecnico == "1" || $roles->ordenes == "1") : ?>
                    <i class="fa-solid fa-layer-group"></i> <span> &nbsp Menu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                <?php endif; ?>
                </a>

                <ul class="treeview-menu">
                <?php if ($roles->cliente == "1") : ?>
                    <li><a href="<?= base_url('mantenimiento/ccliente') ?>"> <i class="fa-solid fa-people-group"></i> Clientes</a></li>
                <?php endif; ?>
                <?php if ($roles->tecnico == "1") : ?>
                    <li><a href="<?= base_url('mantenimiento/ctecnico') ?>"><i class="fa-solid fa-user-gear"></i> Técnicos</a></li>
                <?php endif; ?>
                <?php if ($roles->ordenes == "1") : ?>
                    <li><a href="<?= base_url('mantenimiento/corden') ?>"><i class="fa-solid fa-file-lines"></i> &nbsp Órdenes</a></li>
                <?php endif; ?>
                <?php if ($roles->proveedores == "1") : ?>
                    <li><a href="<?= base_url('mantenimiento/cproveedores') ?>"><i class="fa-solid fa-truck-fast"></i> Proveedores</a></li>
                <?php endif; ?>
                </ul>
            </li>

            <?php if ($roles->estados_trabajo == "1" || $roles->equipos == "1" || $roles->remitos == "1") : ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-book"></i> <span> &nbsp Gestión</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('mantenimiento/ctrabajos') ?>"><i class="fa-solid fa-chart-line"></i> Estados de Trabajo</a></li>
                    <?php if ($roles->equipos == "1") : ?>
                    <li><a href="<?= base_url('mantenimiento/cequipos') ?>"><i class="fa-solid fa-file-invoice"></i> &nbsp Recepción Equipos</a></li>
                    <?php endif; ?>
                    <?php if ($roles->remitos == "1") : ?>
                    <li><a href="<?= base_url('mantenimiento/cremitos') ?>"><i class="fa-solid fa-file-invoice-dollar"></i> &nbsp Remitos</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

            <?php if ($roles->usuarios == "1" || $roles->roles == "1") : ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-lock"></i> <span> &nbsp Administrador</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if ($roles->usuarios == "1") : ?>
                    <li><a href="<?= base_url('mantenimiento/cusuario') ?>"><i class="fa-solid fa-circle-user"></i> Usuarios</a></li>
                    <?php endif; ?>

                    <?php if ($roles->roles == "1") : ?>
                    <li><a href="<?= base_url('mantenimiento/croles') ?>"><i class="fa-solid fa-key"></i> Roles</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
