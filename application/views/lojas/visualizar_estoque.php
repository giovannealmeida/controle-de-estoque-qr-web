<!--HEADER COMPLEMENTAR-->
<title>Administradores</title>
<!--PAGE LEVELS PLUGINS-->
<link href="<?= base_url('/assets/global/plugins/datatables/datatables.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="#">Controle de Lojas</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Visualizar estoque</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <h3 class="page-title"> Visualizar Estoque
            <small>para lojas credenciadas</small>
        </h3>

        <?php if ($this->session->flashdata("success")): ?>
            <br/>
            <div class="alert alert-success">
                <strong><?= $this->session->flashdata("success"); ?></strong><br/>
            </div>
        <?php elseif ($this->session->flashdata("fail")): ?>
            <br/>
            <div class="alert alert-danger">
                <strong><?= $this->session->flashdata("fail"); ?></strong><br/>
            </div>
        <?php endif; ?>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Lista de Produtos</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Loja
                                    </th>
                                    <th>
                                        Código do Produto
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Quantidade
                                    </th>
                                    <th>
                                        Valor Varejo
                                    </th>
                                    <th>
                                        Valor Atacado
                                    </th>
                                    <th>
                                        Data
                                    </th>
                                </tr>
                            </thead>
                            <?php if ($records != null): ?>
                                <?php foreach ($records as $value): ?>
                                    <tr>
                                        <td tabindex="0" class="sorting_1"> <?= $value->cnpj . ' - ' . $value->fantasy_name ?> </td>
                                        <td> <?= $value->code ?> </td>
                                        <td> <?= $value->product_name ?> </td>
                                        <td> <?= $value->amount ?> </td>
                                        <td> <?= $value->retail_value ?> </td>
                                        <td> <?= $value->wholesale_value ?> </td>
                                        <td>
                                            <div class="margin-bottom-5">
                                                <a type="button" href="<?= base_url('Lojas/editar?id=' . $value->id) ?>" class="btn green">
                                                    <i class="fa fa-pencil"></i> Editar</a>
                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir? A quantidade de produtos irá voltar para o estoque geral')" href="<?= base_url('Lojas/excluir?id=' . $value->id) ?>"><span class="glyphicon glyphicon-remove"></span> Remover</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE PLUGINS -->
<!-- <script src="<?= base_url('/assets/global/plugins/jquery.min.js'); ?>" type="text/javascript"></script> -->
<script src="<?= base_url("assets/js/validator.js") ?>"  type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js") ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"  type="text/javascript"></script>
<script src="<?= base_url('assets/js/mask.js') ?>"  type="text/javascript"></script>
<script src="<?= base_url('/assets/global/scripts/datatable.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/global/plugins/datatables/datatables.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/pages/scripts/table-datatables-buttons.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/pages/scripts/components-bootstrap-select.min.js") ?>"  type="text/javascript"></script>

<!-- END CONTAINER -->
<!-- END THEME LAYOUT SCRIPTS -->
