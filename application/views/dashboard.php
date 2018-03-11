<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height:982px">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Painel de Controle</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Estoque</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Painel de Controle
            <small>Estoque &amp; vendas</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-dollar fa-icon-medium"></i>
                    </div>
                    <div class="details">
                        <div class="number"> R$ <?= number_format($total_sales->value, 2, ',', '.') ?> </div> <!--Somatório dos itens vendidos -->
                        <div class="desc"> Total de Vendas </div>
                    </div>
                    <a class="more" href="javascript:;"> Veja mais
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="details">
                        <div class="number"><?= count($stock) ?></div>
                        <div class="desc"> Produtos em Estoque </div>
                    </div>
                    <a class="more" href="javascript:;"> Veja mais
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-group fa-icon-medium"></i>
                    </div>
                    <div class="details">
                        <div class="number"> <?= count($clients) ?> </div>
                        <div class="desc"> Clientes </div>
                    </div>
                    <a class="more" href="javascript:;"> Veja mais
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Visão Geral</span>
                            <span class="caption-helper">relatório</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#overview_1" data-toggle="tab"> Top Vendas </a>
                                </li>
                                <li>
                                    <a href="#overview_2" data-toggle="tab"> Top Vendedores </a>
                                </li>
                                <li>
                                    <a href="#overview_3" data-toggle="tab"> Top Lojas </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="overview_1">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <!-- Begin alimentar com informações do Banco-->
                                            <thead>
                                                <tr>
                                                    <th> Nome do Produto </th>
                                                    <th> Valor </th>
                                                    <th> Tipo </th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($top_sales as $value): ?>
                                                <tr>
                                                    <td>
                                                        <?= $value->name ?>
                                                    </td>
                                                    <td>R$ <?= number_format($value->top_value, 2, ',', '.') ?></td>       
                                                    <td> <?= $value->amount ?> </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                            <!-- END alimentar com informações do Banco-->
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="overview_2">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Nome do vendedor </th>
                                                    <th> Qtd Vendas </th>
                                                    <th> Valor vendido </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($top_salesman as $value): ?>
                                                    <tr>
                                                        <td>
                                                            <?= $value->name ?>
                                                        </td>
                                                        <td>R$ <?= number_format($value->top_value, 2, ',', '.') ?></td>
                                                        <td> <?= $value->amount ?> </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="overview_3">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Nome da loja </th>
                                                    <th> Qtd Vendas </th>
                                                    <th> Valor vendido </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($top_stores as $value): ?>
                                                    <tr>
                                                        <td>
                                                            <?= $value->name ?>
                                                        </td>
                                                        <td>R$ <?= number_format($value->top_value, 2, ',', '.') ?></td>
                                                        <td> <?= $value->amount ?> </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
            <div class="col-md-6">
                <!-- Begin: life time stats -->
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class="icon-globe font-red"></i>
                            <span class="caption-subject font-red bold uppercase">Histórico de Vendas</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_ecommerce_tab_1" data-toggle="tab"> Atacado </a>
                            </li>
                            <li>
                                <a href="#portlet_ecommerce_tab_2" id="statistics_orders_tab" data-toggle="tab"> Varejo </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_ecommerce_tab_1">
                                <div id="statistics_1" class="chart" style="padding: 0px; position: relative;"> <canvas class="flot-base" width="312" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 312px; height: 300px;"></canvas></div>
                            </div>
                            <div class="tab-pane" id="portlet_ecommerce_tab_2">
                                <div id="statistics_2" class="chart"> </div>
                            </div>
                        </div>
                        <div class="well margin-top-20">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-success"> Atacado: </span>
                                    <?php if ($total_sales_retail->value != null): ?>
                                        <h3>R$ <?= number_format($total_sales_wholesale->value, 2, ',', '.') ?></h3>
                                    <?php else: ?>
                                        <h3>R$ 0,00</h3>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-info"> Varejo: </span>
                                    <?php if ($total_sales_retail->value != null): ?>
                                        <h3>R$ <?= number_format($total_sales_retail->value, 2, ',', '.') ?></h3>
                                    <?php else: ?>
                                        <h3>R$ 0,00</h3>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-danger"> Total de vendas Varejo </span>
                                    <?php if ($total_sales_wholesale->amount != null): ?>
                                        <h3><?= $total_sales_wholesale->amount ?></h3>
                                    <?php else: ?>
                                        <h3>0</h3>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-warning"> Total de vendas Atacado</span> <!-- quantidade -->
                                    <?php if ($total_sales_retail->amount != null): ?>
                                        <h3><?= $total_sales_retail->amount ?></h3>
                                    <?php else: ?>
                                        <h3>0</h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>        
    </div>
    <!-- END CONTENT BODY -->
</div>

<script src="<?= base_url("assets/global/plugins/flot/jquery.flot.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/flot/jquery.flot.resize.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/flot/jquery.flot.categories.min.js") ?>" type="text/javascript"></script>

<script>
    var EcommerceDashboard = function () {
        function o(o, i, t, a) {
            $('<div id="tooltip" class="chart-tooltip">R$ ' + a.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.") + "</div>").css({
                position: "absolute",
                display: "none",
                top: i - 40,
                left: o - 60,
                border: "0px solid #ccc",
                padding: "2px 6px",
                "background-color": "#fff"
            }).appendTo("body").fadeIn(200)
        }
        var i = function () {
            var i = [
<?php if (count($statistics_wholesale) > 0): ?>
    <?php foreach ($statistics_wholesale as $statistic): ?>
                        ["<?= $statistic->month ?>/<?= $statistic->year ?>", <?= $statistic->top_value ?>],
    <?php endforeach; ?>
<?php endif; ?>
                            ],
                                    t = ($.plot($("#statistics_1"), [{
                                            data: i,
                                            lines: {
                                                fill: .6,
                                                lineWidth: 0
                                            },
                                            color: ["#f89f9f"]
                                        }, {
                                            data: i,
                                            points: {
                                                show: !0,
                                                fill: !0,
                                                radius: 5,
                                                fillColor: "#f89f9f",
                                                lineWidth: 3
                                            },
                                            color: "#fff",
                                            shadowSize: 0
                                        }], {
                                        xaxis: {
                                            tickLength: 0,
                                            tickDecimals: 0,
                                            mode: "categories",
                                            min: 2,
                                            font: {
                                                lineHeight: 15,
                                                style: "normal",
                                                variant: "small-caps",
                                                color: "#6F7B8A"
                                            }
                                        },
                                        yaxis: {
                                            ticks: 3,
                                            tickDecimals: 0,
                                            tickColor: "#f0f0f0",
                                            font: {
                                                lineHeight: 15,
                                                style: "normal",
                                                variant: "small-caps",
                                                color: "#6F7B8A"
                                            }
                                        },
                                        grid: {
                                            backgroundColor: {
                                                colors: ["#fff", "#fff"]
                                            },
                                            borderWidth: 1,
                                            borderColor: "#f0f0f0",
                                            margin: 0,
                                            minBorderMargin: 0,
                                            labelMargin: 20,
                                            hoverable: !0,
                                            clickable: !0,
                                            mouseActiveRadius: 6
                                        },
                                        legend: {
                                            show: !1
                                        }
                                    }), null);
                            $("#statistics_1").bind("plothover", function (i, a, e) {
                                if ($("#x").text(a.x.toFixed(2)), $("#y").text(a.y.toFixed(2)), e) {
                                    if (t != e.dataIndex) {
                                        t = e.dataIndex, $("#tooltip").remove();
                                        e.datapoint[0].toFixed(2), e.datapoint[1].toFixed(2);
                                        o(e.pageX, e.pageY, e.datapoint[0], e.datapoint[1])
                                    }
                                } else
                                    $("#tooltip").remove(), t = null
                            })
                        },
                                t = function () {
                                    var i = [
<?php if (count($statistics_retail) > 0): ?>
    <?php foreach ($statistics_retail as $statistic): ?>
                                                ["<?= $statistic->month ?>/<?= $statistic->year ?>", <?= $statistic->top_value ?>],
    <?php endforeach; ?>
<?php endif; ?>
                                                            ],
                                                                    t = ($.plot($("#statistics_2"), [{
                                                                            data: i,
                                                                            lines: {
                                                                                fill: .6,
                                                                                lineWidth: 0
                                                                            },
                                                                            color: ["#BAD9F5"]
                                                                        }, {
                                                                            data: i,
                                                                            points: {
                                                                                show: !0,
                                                                                fill: !0,
                                                                                radius: 5,
                                                                                fillColor: "#BAD9F5",
                                                                                lineWidth: 3
                                                                            },
                                                                            color: "#fff",
                                                                            shadowSize: 0
                                                                        }], {
                                                                        xaxis: {
                                                                            tickLength: 0,
                                                                            tickDecimals: 0,
                                                                            mode: "categories",
                                                                            min: 2,
                                                                            font: {
                                                                                lineHeight: 14,
                                                                                style: "normal",
                                                                                variant: "small-caps",
                                                                                color: "#6F7B8A"
                                                                            }
                                                                        },
                                                                        yaxis: {
                                                                            ticks: 3,
                                                                            tickDecimals: 0,
                                                                            tickColor: "#f0f0f0",
                                                                            font: {
                                                                                lineHeight: 14,
                                                                                style: "normal",
                                                                                variant: "small-caps",
                                                                                color: "#6F7B8A"
                                                                            }
                                                                        },
                                                                        grid: {
                                                                            backgroundColor: {
                                                                                colors: ["#fff", "#fff"]
                                                                            },
                                                                            borderWidth: 1,
                                                                            borderColor: "#f0f0f0",
                                                                            margin: 0,
                                                                            minBorderMargin: 0,
                                                                            labelMargin: 20,
                                                                            hoverable: !0,
                                                                            clickable: !0,
                                                                            mouseActiveRadius: 6
                                                                        },
                                                                        legend: {
                                                                            show: !1
                                                                        }
                                                                    }), null);
                                                            $("#statistics_2").bind("plothover", function (i, a, e) {
                                                                if ($("#x").text(a.x.toFixed(2)), $("#y").text(a.y.toFixed(2)), e) {
                                                                    if (t != e.dataIndex) {
                                                                        t = e.dataIndex, $("#tooltip").remove();
                                                                        e.datapoint[0].toFixed(2), e.datapoint[1].toFixed(2);
                                                                        o(e.pageX, e.pageY, e.datapoint[0], e.datapoint[1])
                                                                    }
                                                                } else
                                                                    $("#tooltip").remove(), t = null
                                                            })
                                                        };
                                                return {
                                                    init: function () {
                                                        i(), $("#statistics_orders_tab").on("shown.bs.tab", function (o) {
                                                            t()
                                                        })
                                                    }
                                                }
                                            }();
                                            jQuery(document).ready(function () {
                                                EcommerceDashboard.init()
                                            });
</script>
