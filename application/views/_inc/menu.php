<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"> </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                <li class="heading">
                    <h3 class="uppercase">Menu</h3>
                </li>
                <li class="nav-item  ">
                    <a href="<?= base_url("Inicio") ?>" class="nav-link nav-toggle">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Paindel de Controle</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Equipe</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?= base_url("Equipe/administradores") ?>" class="nav-link ">
                                <span class="title">Administradores</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("Equipe/lojas") ?>" class="nav-link ">
                                <span class="title">Lojas</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("Equipe/vendedores") ?>" class="nav-link ">
                                <span class="title">Vendedores</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-inbox"></i>
                        <span class="title">Estoque</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?= base_url("Estoque/cadastro") ?>" class="nav-link ">
                                <span class="title">Cadastrar</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("Estoque") ?>" class="nav-link ">
                                <span class="title">Gerenciar</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-dollar"></i>
                        <span class="title">Vendas</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?= base_url("Vendas_controller/etiquetas") ?>" class="nav-link ">
                                <span class="title">Gerar Etiqueta</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("Vendas_controller/venda") ?>" class="nav-link ">
                                <span class="title">Visualizar Vendas</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="title">Controle de Lojas</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?= base_url("Lojas_controller/cadastro") ?>" class="nav-link ">
                                <span class="title">Cadastro de Estoque</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("Lojas_controller/visualizar") ?>" class="nav-link ">
                                <span class="title">Visualizar Estoque</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("Lojas_controller/translado") ?>" class="nav-link ">
                                <span class="title">Translado</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Clientes</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?= base_url("Clientes") ?>" class="nav-link ">
                                <span class="title">Gerenciar</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
