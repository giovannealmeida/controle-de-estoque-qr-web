<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url("assets/global/plugins/datatables/datatables.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/fancybox/source/jquery.fancybox.css") ?>" rel="stylesheet" type="text/css" />


<link href="<?= base_url("assets/global/plugins/datatables/datatables.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css") ?>" rel="stylesheet" type="text/css" />

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height:1368px">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Estoque</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Visualizar Produtos</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Lista de Produtos
                        <small>em estoque</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Estoque Geral</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                      <div class="row"><div class="col-md-12">
                                        <div class="dt-buttons">
                                          <a class="dt-button buttons-print btn dark btn-outline" tabindex="0" aria-controls="sample_1">
                                            <span>Print</span>
                                          </a>
                                          <a class="dt-button buttons-copy buttons-html5 btn red btn-outline" tabindex="0" aria-controls="sample_1">
                                            <span>Copy</span>
                                          </a>
                                          <a class="dt-button buttons-pdf buttons-html5 btn green btn-outline" tabindex="0" aria-controls="sample_1">
                                            <span>PDF</span>
                                          </a>
                                          <a class="dt-button buttons-excel buttons-html5 btn yellow btn-outline" tabindex="0" aria-controls="sample_1">
                                            <span>Excel</span>
                                          </a>
                                          <a class="dt-button buttons-csv buttons-html5 btn purple btn-outline" tabindex="0" aria-controls="sample_1">
                                            <span>CSV</span>
                                          </a>
                                          <a class="dt-button buttons-collection buttons-colvis btn dark btn-outline" tabindex="0" aria-controls="sample_1">
                                            <span>Columns</span>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6 col-sm-12">
                                        <div class="dataTables_length" id="sample_1_length">
                                          <label>
                                            <select name="sample_1_length" aria-controls="sample_1" class="form-control input-sm input-xsmall input-inline">
                                              <option value="5">5</option>
                                              <option value="10">10</option>
                                              <option value="15">15</option>
                                              <option value="20">20</option>
                                              <option value="-1">All</option>
                                            </select> entries</label>
                                          </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                          <div id="sample_1_filter" class="dataTables_filter">
                                            <label>Buscar:
                                              <input type="search" class="form-control input-sm input-small input-inline" placeholder="" aria-controls="sample_1">
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style="width: 1114px;">
                                        <thead>
                                            <tr role="row">
                                              <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 180px;" aria-sort="ascending" aria-label=" Rendering engine : activate to sort column descending"> Código do Produto </th>
                                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 225px;" aria-label=" Browser : activate to sort column ascending"> Nome </th>
                                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 202px;" aria-label=" Platform(s) : activate to sort column ascending"> Quantidade </th>
                                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 153px;" aria-label=" Engine version : activate to sort column ascending"> Status </th>
                                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 110px;" aria-label=" CSS grade : activate to sort column ascending"> Ações </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1"> Gecko </td>
                                                <td> Firefox 1.0 </td>
                                                <td> Win 98+ / OSX.2+ </td>
                                                <td> <span class="label label-sm label-success"> Estoque </span> </td>
                                                <td>
                                                  <div class="margin-bottom-5">
                                                    <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                        <i class="fa fa-pencil"></i> Editar</button>
                                                    </div>
                                                </td>
                                            </tr><tr role="row" class="even">
                                                <td tabindex="0" class="sorting_1"> Gecko </td>
                                                <td> Firefox 1.5 </td>
                                                <td> Win 98+ / OSX.2+ </td>
                                                <td> <span class="label label-sm label-danger"> Devolução </span> </td>
                                                <td>
                                                  <div class="margin-bottom-5">
                                                    <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                        <i class="fa fa-pencil"></i> Editar</button>
                                                    </div>
                                                </td>
                                            </tr><tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1"> Gecko </td>
                                                <td> Firefox 2.0 </td>
                                                <td> Win 98+ / OSX.2+ </td>
                                                <td> 1.8 </td>
                                                <td> A </td>
                                            </tr><tr role="row" class="even">
                                                <td tabindex="0" class="sorting_1"> Gecko </td>
                                                <td> Firefox 3.0 </td>
                                                <td> Win 2k+ / OSX.3+ </td>
                                                <td> 1.9 </td>
                                                <td> A </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1" tabindex="0"> Gecko </td>
                                                <td> Camino 1.0 </td>
                                                <td> OSX.2+ </td>
                                                <td> 1.8 </td>
                                                <td> A </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1" tabindex="0"> Gecko </td>
                                                <td> Camino 1.5 </td>
                                                <td> OSX.3+ </td>
                                                <td> 1.8 </td>
                                                <td> A </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1" tabindex="0"> Gecko </td>
                                                <td> Netscape 7.2 </td>
                                                <td> Win 95+ / Mac OS 8.6-9.2 </td>
                                                <td> 1.7 </td>
                                                <td> A </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1" tabindex="0"> Gecko </td>
                                                <td> Netscape Browser 8 </td>
                                                <td> Win 98SE+ </td>
                                                <td> 1.7 </td>
                                                <td> A </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1" tabindex="0"> Gecko </td>
                                                <td> Netscape Navigator 9 </td>
                                                <td> Win 98+ / OSX.2+ </td>
                                                <td> 1.8 </td>
                                                <td> A </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1" tabindex="0"> Gecko </td>
                                                <td> Mozilla 1.0 </td>
                                                <td> Win 95+ / OSX.1+ </td>
                                                <td> 1 </td>
                                                <td> A </td>
                                            </tr></tbody>
                                    </table>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-5 col-sm-12">
                                      <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing 1 to 10 of 43 entries</div>
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                      <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                        <ul class="pagination" style="visibility: visible;">
                                          <li class="prev disabled">
                                            <a href="#" title="Prev"><i class="fa fa-angle-left"></i>
                                            </a>
                                          </li>
                                          <li class="active"><a href="#">1</a>
                                          </li>
                                          <li>
                                            <a href="#">2</a>
                                          </li>
                                          <li><a href="#">3</a>
                                          </li><li><a href="#">4</a>
                                          </li><li><a href="#">5</a>
                                          </li><li class="next">
                                            <a href="#" title="Next">
                                              <i class="fa fa-angle-right">
                                              </i>
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                </div>
                <!-- END CONTENT BODY -->
            </div>

<script src="<?= base_url("assets/global/scripts/datatable.js")?>" type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/datatables/datatables.min.js")?>" type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js")?>" type="text/javascript"></script>
<script src="<?= base_url("assets/pages/scripts/table-datatables-buttons.min.js")?>" type="text/javascript"></script
