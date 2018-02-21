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
                    <a href="#">Controle de Loja</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#"><?= isset($store_stock->id) ? 'Edição de estoque' : 'Cadastro de estoque' ?></a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <h3 class="page-title"><?= isset($store_stock->id) ? 'Edição de estoque' : 'Cadastro de estoque' ?>
            <small>para lojas credenciadas</small>
        </h3>
        <!-- Produto a ser seelcionado-->
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line boxless tabbable-reversed">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_2">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Selecione os produtos para a loja</div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="<?= isset($store_stock->id)  ? base_url('Lojas_controller/editar?id=' . $store_stock->id) : base_url('Lojas_controller/cadastro') ?>" class="form-horizontal" method="post" data-toggle ="validator">
                                        <?php if (validation_errors()): ?>
                                            <br/>
                                            <div class="alert alert-danger">
                                                <strong>Erros no formulário!</strong><br/>
                                                <br/>
                                                <?php echo validation_errors(); ?>
                                            </div>
                                        <?php elseif ($this->session->flashdata("success")): ?>
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
                                        <div class="form-body">
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Selecione a Loja</label>
                                                        <div class="col-md-9">
                                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => 'true', 'data-width' => "100%", 'required' => "true", 'name' => "store_id", 'id' => "store_id"), $stores, isset($store_stock->store_id) ? $store_stock->store_id : NULL, set_value('store_id')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Quantidade</label> <!-- EXIBIR MENSAGEM DE ERRO SE A QUANTIDADE ULTRAPASSAR A DO ESTOQUE GERAL-->
                                                        <div class="col-md-5">
                                                            <?= form_input(array('name' => 'amount', 'class' => 'form-control', 'id' => 'amount', 'type' => 'number', 'placeholder' => 'Digite a quantidade do produto', 'required' => 'required', 'value' => isset($store_stock->amount) ? $store_stock->amount : ''), set_value('amount')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Produto</label>
                                                        <div class="col-md-9">
                                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => 'true', 'data-width' => "100%", 'required' => "true", 'name' => "product_id", 'id' => "product_id",), $products, isset($store_stock->product_id) ? $store_stock->product_id : NULL, set_value('product_id')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Valor</label> <!-- EXIBIR MENSAGEM DE ERRO SE A QUANTIDADE ULTRAPASSAR A DO ESTOQUE GERAL-->
                                                        <div class="col-md-5">
                                                            <?= form_input(array('name' => 'value', 'class' => 'form-control money', 'id' => 'value', 'type' => 'text', 'required' => 'required', 'value' => isset($store_stock->value) ? $store_stock->value : ''), set_value('value')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"> Enviar </button>
                                                            <button type="button" class="btn default">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script>
<?php if (isset($store_stock)): ?>
    document.getElementById("product_id").disabled = true;
    document.getElementById("store_id").disabled = true;
<?php endif; ?>
    var products_info = <?php isset($products_info) ? print_r($products_info) : print_r('null') ?>;
    if (products_info !== null) {
        $("#value").val(products_info[$('select[name=product_id]').val()].value);
        $("#amount").val(products_info[$('select[name=product_id]').val()].quantity);
    }

    $('#product_id').change(function (ev) {
        $("#value").val(products_info[this.value].value);
        $("#amount").val(products_info[this.value].quantity);
        //$("#amount").val();
    });
</script>