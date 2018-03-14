<!--HEADER COMPLEMENTAR-->
<title>Administradores</title>
<!--PAGE LEVELS PLUGINS-->
<link href="<?= base_url('/assets/global/plugins/datatables/datatables.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />

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
                    <a href="#">Visualizar</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <h3 class="page-title"> Lista de venda
            <small>por loja</small>
        </h3>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Loja
                                    </th>
                                    <th>
                                        Vendedor
                                    </th>
                                    <th>
                                        Produto
                                    </th>
                                    <th>
                                        Valor
                                    </th>
                                    <th>
                                        Qtde
                                    </th>
                                    <th>
                                        Data
                                    </th>
                                    <th>
                                        Cliente
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($sales != null): ?>
                                    <?php foreach ($sales as $key => $sale): ?>
                                        <?php $total = 0; ?>
                                        <?php foreach ($sale as $key2 => $value): ?>
                                            <tr>
                                                <td>
                                                    <?= $key ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->store == null): ?>
                                                        <?= $value->store_name ?>
                                                        <span class="label label-sm label-danger"> Excluido </span>
                                                    <?php else: ?>
                                                        <?= $value->store ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->status == 1): ?>
                                                        <span class="label label-sm label-warning"> Desativado </span>
                                                    <?php endif; ?>
                                                    <?php if ($value->product == null): ?>
                                                        <?= $value->salesman_name ?>
                                                        <span class="label label-sm label-danger"> Excluido </span>
                                                    <?php else: ?>
                                                        <?= $value->salesman ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->product == null): ?>
                                                        <?= $value->product_name ?>
                                                        <span class="label label-sm label-danger"> Excluido </span>
                                                    <?php else: ?>
                                                        <?= $value->product ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    R$ <?= number_format($value->value, 2, ',', '.') ?>
                                                </td>
                                                <td>
                                                    <?= $value->amount ?>
                                                </td>
                                                <td>
                                                    <?php $date = date_create($value->date); ?>
                                                    <?php echo date_format($date, "d/m/Y H:m:s"); ?>
                                                </td>
                                                <td>
                                                    <?= $value->client ?>
                                                </td>
                                                <td>
                                                    R$ <?= number_format($value->amount * $value->value, 2, ',', '.') ?>
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
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

<!-- END CONTAINER -->
<!-- END THEME LAYOUT SCRIPTS -->
