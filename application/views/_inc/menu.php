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
                    <a href="<?= base_url("statistics_controller/index") ?>" class="nav-link nav-toggle">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Estatísticas</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Clientes</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?= base_url("client_controller/new_client") ?>" class="nav-link ">
                                <span class="title">Cadastrar</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("client_controller/index") ?>" class="nav-link ">
                                <span class="title">Gerenciar</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="<?= base_url("user_controller/list_royal") ?>" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Royal  Influencer</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?= base_url("user_controller/list_king") ?>" class="nav-link nav-toggle">
                        <i class="icon-star"></i>
                        <span class="title">King  Influencer</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-bulb"></i>
                        <span class="title">Publicações</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?= base_url("publication_controller/new_publication") ?>" class="nav-link ">
                                <span class="title">Cadastrar</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("publication_controller/index") ?>" class="nav-link ">
                                <span class="title">Gerenciar</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if ($user_profile->level_id == 1) : ?>
                    <li class="nav-item  ">
                        <a href="?p=" class="nav-link nav-toggle">
                            <i class="icon-eye"></i>
                            <span class="title">Staff</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="?p=" class="nav-link nav-toggle">
                                    <span class="title">Administradores</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?= base_url("administrador_controller/new_administrador") ?>" class="nav-link ">
                                            <span class="title">Cadastrar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?= base_url("administrador_controller/index") ?>" class="nav-link ">
                                            <span class="title">Gerenciar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="?p=" class="nav-link nav-toggle">
                                    <span class="title">Coordenadores</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?= base_url("coordinator_controller/new_coordinator") ?>" class="nav-link ">
                                            <span class="title">Cadastrar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?= base_url("coordinator_controller/index") ?>" class="nav-link ">
                                            <span class="title">Gerenciar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
