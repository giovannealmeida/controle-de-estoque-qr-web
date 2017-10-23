<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url("assets/global/plugins/datatables/datatables.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/fancybox/source/jquery.fancybox.css") ?>" rel="stylesheet" type="text/css" />

<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Controle de Estoque</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Cadastro de Produto</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Cadastro de Produtos
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_2" data-toggle="tab" aria-expanded="true"> Cadastro </a>
                                    </li>
                                    <li>
                                        <a href="#tab_3" data-toggle="tab"> Visualizar Produtos </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_2">
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Formulário de cadastro </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body">
                                                        <h3 class="form-section">Informações Básicas</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nome do Produto</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" placeholder="ex: Colar de prata com pedra">
                                                                        <span class="help-block"> Defina um nome curto para o produto </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Categoria</label>
                                                                    <div class="col-md-9">
                                                                        <select name="categoria" class="form-control">
                                                                            <option value="1">Produto acabado</option>
                                                                            <option value="1">Mercadoria para Revenda</option>
                                                                            <option value="1">Matéria-prima</option>
                                                                            <option value="1">Embalagem</option>
                                                                            <option value="1">Produto em processo</option>
                                                                            <option value="1">Subproduto</option>
                                                                            <option value="1">Produto intermediário</option>
                                                                            <option value="1">Material consumo</option>
                                                                            <option value="1">Serviço</option>
                                                                        </select>
                                                                        <span class="help-block"> This field has error. </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Descrição</label>
                                                                    <div class="col-md-9">
                                                                      <input type="text" class="form-control" placeholder="ex: corrente entrelaçada com pedra indiana">
                                                                      <span class="help-block"> Descreva de maneira completa o produto </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Valor Atacado</label>
                                                                    <div class="col-md-3">
                                                                      <input type="text" class="form-control" placeholder="ex: 5,00">
                                                                      <span class="help-block"> Apenas números </span>
                                                                    </div>
                                                                    <label class="control-label col-md-3">Valor Varejo</label>
                                                                    <div class="col-md-3">
                                                                      <input type="text" class="form-control" placeholder="ex: 5,00">
                                                                      <span class="help-block"> Apenas números </span>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Quantidade em estoque</label>
                                                                    <div class="col-md-6">
                                                                      <input type="text" class="form-control" placeholder="ex: 200">
                                                                      <span class="help-block"> Apenas números </span>
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
                                                                        <button type="submit" class="btn green">Cadastrar</button>
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
                                    <!-- SEGUNDA ABA: VISUALIZAÇÃO -->
                                    <div class="tab-pane" id="tab_3">
                                        <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Último Produto Cadastrado</div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-body">
                                                        <h2 class="margin-bottom-20"> Detalhes do produto </h2>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nome do Produto</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> Produto X </p> <!-- Entrar com informações do banco -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Categoria:</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> Gategoria do produto X </p> <!-- Entrar com informações do banco -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Descrição:</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> Descrição do produto X </p> <!-- Entrar com informações do banco -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Valor de atacado:</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> R$ 5,00 </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label class="control-label col-md-3">Quantidade:</label>
                                                                  <div class="col-md-9">
                                                                      <p class="form-control-static"> 200 </p>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label class="control-label col-md-3">Valor de varejo:</label>
                                                                  <div class="col-md-9">
                                                                      <p class="form-control-static"> R$ 20,00 </p>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <button type="submit" class="btn green">
                                                                            <i class="fa fa-pencil"></i> Editar</button>
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
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
