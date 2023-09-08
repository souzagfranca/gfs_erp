<div class="rows">
    <div class="col-12">
        <div class="caixa">
            <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Lista de solicitação </span>
                <div>
                    <a href="javascript:;" onclick="abrirModal('#addnovo')" class="btn btn-verde mx-1 d-inline-block"><i class="fas fa-plus-circle"></i> Adicionar novo</a>
                    <a href="" class="btn btn-laranja filtro mx-1 d-inline-block"><i class="fas fa-filter"></i> Filtrar</a>
                </div>
            </div>
            <div class="px-3">
                <form name="busca" action="" method="GET">
                    <div class="mostraFiltro bg-padrao mt-2 p-2 radius-4">
                        <div class="rows">
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Data 1</label>
                                <input type="date" name="data_inicial" value="2020-06-15" class="form-campo">
                            </div>
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Data 2</label>
                                <input type="date" name="data_final" value="" class="form-campo">
                            </div>
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Produto</label>
                                <select class="form-campo">
                                    <option value='38'>ABRASIVO CEBO AMARELO </option>
                                    <option value='38'>ABRASIVO CEBO AMARELO </option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Status</label>
                                <select class="form-campo">
                                    <option>ooção</option>
                                </select>
                            </div>
                            <div class="col-2 mt-1 pt-1">
                                <input type="submit" value="Pesquisar" class="btn btn-roxo text-uppercase">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 my-3">
        <form action="cotacao.html" method="post" name="form1">
            <div class="px-3 d-flex text-end">
                <button class="btn btn-azul text-branco" type="submit"><i class="fas fa-arrow-alt-circle-right"></i> Fazer cotação </button>
            </div>
    </div>

    <div class="col-12 mt-3">
        <div class="px-2">
            <div class="tabela-responsiva pb-4">
                <table cellpadding="0" cellspacing="0" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th><input type='checkbox' name='tudo' id="example-select-all" /></th>
                            <th align="center">Id</th>
                            <th align="left">Produto</th>
                            <th align="center">Data Solicitação</th>
                            <th align="center">Status</th>
                            <th align="center">Qtde</th>
                            <th align="center">Editar</th>
                            <th align="center">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td align="center"><input type="checkbox" name="idSolicitacao[]" value="5"></td>
                            <td align="center">5</td>
                            <td align="left">DISC0 210 X 1,10</td>
                            <td align="center">05/06/2020</td>
                            <td align="center"><span class="status status-amarelo">Em Aberto</span></td>
                            <td align="center">10</td>
                            <td align="center"> <a href="cotacao.html" class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i> Editar</a></td>
                            <td align="center"> <a href="" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i> Excluir</a></td>
                        </tr>
                        <tr>
                            <td align="center"><input type="checkbox" name="idSolicitacao[]" value="5"></td>
                            <td align="center">5</td>
                            <td align="left">DISC0 210 X 1,10</td>
                            <td align="center">05/06/2020</td>
                            <td align="center"><span class="status status-verde">Cotado</span></td>
                            <td align="center">10</td>
                            <td align="center"> <a href="cotacao.html" class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i> Editar</a></td>
                            <td align="center"> <a href="" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i> Excluir</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
</div>