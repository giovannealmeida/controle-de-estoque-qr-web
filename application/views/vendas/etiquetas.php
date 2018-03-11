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
                    <a href="#">Vendas</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Gerar etiquetas</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- Produto a ser seelcionado-->
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Selecione o produto</h4>
                    </div>
                    <div class="modal-body">
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form class="form-horizontal" data-toggle ="validator" action="#" method="POST">
                                <div class="form-body">
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Loja</label>
                                                <div class="col-md-9">
                                                    <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => 'true', 'data-width' => "100%", 'required' => "true", 'name' => "store_id", 'id' => "store_id"), $stores, set_value('store_id')); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Produto</label> <!-- EXIBIR MENSAGEM DE ERRO SE A QUANTIDADE ULTRAPASSAR A DO ESTOQUE GERAL-->
                                                <div class="col-md-9">
                                                    <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => 'true', 'data-width' => "100%", 'required' => "true", 'name' => "product_id", 'id' => "product_id",), $products, set_value('product_id')); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Quantidade</label> <!-- EXIBIR MENSAGEM DE ERRO SE A QUANTIDADE ULTRAPASSAR A DO ESTOQUE GERAL-->
                                                <div class="col-md-9">
                                                    <?= form_input(array('name' => 'amount', 'class' => 'form-control', 'id' => 'amount', 'type' => 'number', 'placeholder' => 'Digite a quantidade do produto', 'required' => 'required', 'value' => '63'), set_value('amount')); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default" data-dismiss="modal" id="btnAdcionar">Adicionar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <h3 class="page-title"> Lista de etiquetas
            <small>por loja</small>
        </h3>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Lista de etiquetas</span>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button class="btn green" data-toggle="modal" data-target="#myModal"> Adicionar
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <form class="form-horizontal" data-toggle ="validator" action="<?= base_url('Vendas/etiquetas') ?>" method="POST">
                            <table class="table table-striped table-bordered table-hover sample_1" >
                                <thead id="table_etiquetas">
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
                                            Opção <!--Remover-->
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary" formtarget="_blank">Gerar</button>
                                </div>
                            </div>
                        </form>
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
<script src="../assets/pages/scripts/table-datatables-editable.js" type="text/javascript"></script>
<script>
    $('#store_id').change(function (ev) {
        changeProduct(this);
    });

    function changeProduct(store_id) {
        $("#product_id").empty();
        $('#product_id').append($('<option></option>').val('').html("Carregando..."));
        $('#product_id').prop('disabled', true);
        $('#product_id').selectpicker('refresh');
        var base = '<?= base_url() ?>';
        if (store_id.value == 0) {
            urlConsulta = base + "index.php/consult_controller/getProducts";
        } else {
            urlConsulta = base + "index.php/consult_controller/getProductByStore/" + store_id.value;
        }
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
            },
            error: function (error) {
                alert("Falha ao consultar produto!");
            }
        });
    }

    $('#btnAdcionar').click(function () {
        var store = $("#store_id option:selected").val();
        var product = $("#product_id option:selected").val();
        if (store == 0) {
            urlConsulta = base_url.url + "index.php/consult_controller/getProducts/" + product;
        } else {
            urlConsulta = base_url.url + "index.php/Consult_controller/getProductByStore/" + store + '/' + product;
        }
        var jqTds = $('>td');
        $.ajax({url: urlConsulta,
            success: function (result) {
                $.each(JSON.parse(result), function (index, item) {
                    var table = $('.sample_1').DataTable();
                    var rowNode = table.row.add([store == 0 ? 'Estoque' : item.cnpj + ' - ' + item.store, item.code, item.name, $('#amount').val(), '<a class="btn btn-danger btn-sm" type="button" onClick="remove(this)"><span class="glyphicon glyphicon-remove"></span> Remover</a></a>' + '<input type="hidden" name="product_id[]" value="' + item.id + '">' + '<input type="hidden" name="retail_value[]" value="' + item.retail_value + '">'  + '<input type="hidden" name="wholesale_value[]" value="' + item.wholesale_value + '">' + '<input type="hidden" name="amount[]" value="' + $('#amount').val() + '">']).draw().node();
                    $(rowNode).find('td').attr('name', 'line1');
                });
                $('#amount').val('63');
            },
            error: function (error) {
                alert("Falha ao consultar produto!");
            }
        });
    });

    function remove(btn) {
        var row = btn.parentNode.parentNode;
        var table = $('.sample_1').DataTable();
        table.row(row).remove().draw();
    }
</script>
<!-- END CONTAINER -->
<!-- END THEME LAYOUT SCRIPTS -->
