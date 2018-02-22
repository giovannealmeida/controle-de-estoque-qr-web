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
                    <a href="#">Translado de estoque</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <h3 class="page-title"> Translado de Estoque
            <small>para lojas credenciadas</small>
        </h3>
        <h3 class="page-title">
            <small> Escolha a loja de origem e em seguida a de destino</small>
        </h3>
        <!-- END PAGE HEADER-->
        <!-- Produto a ser seelcionado-->
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line boxless tabbable-reversed">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_2">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Selecione os produtos par a a loja</div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="<?= base_url('Lojas_controller/translado') ?>" class="form-horizontal" method="post" data-toggle ="validator">
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
                                                        <label class="control-label col-md-3">Loja Origem</label>
                                                        <div class="col-md-9">
                                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => 'true', 'data-width' => "100%", 'required' => "true", 'name' => "home_store_id", 'id' => "home_store_id"), $stores, set_value('home_store_id')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Loja Destino</label>
                                                        <div class="col-md-5">
                                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => 'true', 'data-width' => "100%", 'required' => "true", 'name' => "destination_store_id", 'id' => "destination_store_id"), $stores, set_value('destination_store_id')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--

                                            </div>-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Produto</label>
                                                            <div class="col-md-9">
                                                                <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => 'true', 'data-width' => "100%", 'required' => "true", 'name' => "product_id", 'id' => "product_id",), $products, set_value('product_id')); ?>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Valor</label> <!-- EXIBIR MENSAGEM DE ERRO SE A QUANTIDADE ULTRAPASSAR A DO ESTOQUE GERAL-->
                                                            <div class="col-md-5">
                                                                <?= form_input(array('name' => 'value', 'class' => 'form-control money', 'id' => 'value', 'type' => 'text', 'required' => 'required'), set_value('value')); ?>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Quantidade</label> <!-- EXIBIR MENSAGEM DE ERRO SE A QUANTIDADE ULTRAPASSAR A DO ESTOQUE GERAL-->
                                                            <div class="col-md-5">
                                                                <?= form_input(array('name' => 'amount', 'class' => 'form-control', 'id' => 'amount', 'type' => 'number', 'placeholder' => 'Digite a quantidade do produto', 'required' => 'required'), set_value('amount')); ?>
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
<script>
    var old = '<?= set_value('home_store_id') ?>';
    if (old != '') {
        changeProduct($('#home_store_id option[value=' + <?= set_value('home_store_id') ?> + ']')[0], 1);
    }
    $('#home_store_id').change(function (ev) {
        changeProduct(this, 2);
    });


    function changeProduct(store_id, origem) {
        if (origem == 1) {
            var index = store_id.index;
        } else {
            var index = store_id.selectedIndex;
        }

        for (var i = 0; i < document.getElementById("destination_store_id").options.length; i++) {
            if (document.getElementById("destination_store_id").options[i].index == index) {
                document.getElementById("destination_store_id").options[i].disabled = true;
            } else {
                document.getElementById("destination_store_id").options[i].disabled = false;
            }
            $('#destination_store_id option[value=' + i + ']').removeAttr('selected');
        }
        if (origem == 2) {
            $('#destination_store_id option[value=""]').attr('selected', 'selected');
            $('#destination_store_id').selectpicker('refresh');
        }

        $("#product_id").empty();
        $('#product_id').append($('<option></option>').val('').html("Carregando..."));
        $('#product_id').prop('disabled', true);
        $('#product_id').selectpicker('refresh');
        var base = '<?= base_url() ?>';
        urlConsulta = base + "index.php/consult_controller/getProductByStore/" + store_id.value;
        $.ajax({url: urlConsulta,
            success: function (result) {
                $("#product_id").empty();
                $('#product_id').append($('<option></option>').val('').html("Selecione um produto"));
                $.each(JSON.parse(result), function (index, item) {
                    if (index == store_id.index - 1) {
                        $('#product_id').append($('<option></option>').val(item.id).html(item.name).attr('selected', 'selected'));
                    } else {
                        $('#product_id').append($('<option></option>').val(item.id).html(item.name));
                    }
                });

                $('#product_id').prop('disabled', false);
                $('#product_id').selectpicker('refresh');
                if (origem == 2) {
                    $("#value").val('');
                    $("#amount").val('');
                }
            },
            error: function (error) {
                alert("Falha ao consultar produto!");
            }
        });
    }
    $('#product_id').change(function (ev) {
        $('#amount').prop('disabled', true);
        $('#value').prop('disabled', true);
        urlConsulta = base_url.url + "index.php/consult_controller/getProductByStore/" + $('#home_store_id').val() + '/' + this.value;
        $.ajax({url: urlConsulta,
            success: function (result) {
                $.each(JSON.parse(result), function (index, item) {
                    $("#value").val(item.value);
                    $("#amount").val(item.amount);
                });

                $('#amount').prop('disabled', false);
                $('#value').prop('disabled', false);
            },
            error: function (error) {
                alert("Falha ao consultar produto!");
            }
        });
    });
</script>

<!-- END CONTAINER -->
<!-- END THEME LAYOUT SCRIPTS -->
