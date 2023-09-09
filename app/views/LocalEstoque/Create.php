<div class="rows">
    <div class="col-12">
        <div class="caixa">
            <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Local de Estoque </span>

            </div>

            <div class="p-1">
                <?php
                $this->verMsg();
                $this->verErro();
                ?>
            </div>
            <form action="<?php echo URL_BASE . "localestoque/salvar" ?>" method="Post">

                <div class="px-2 pt-2">
                    <div class="bg-padrao border radius-4 mt-2 p-3 radius-4">
                        <div class="rows">
                            <div class="col-8">
                                <label class="text-label d-block text-branco">Local de estoque</label>
                                <input type="text" name="local_estoque" value="<?php echo ($DadosLocalEstoque->local_estoque) ? $DadosLocalEstoque->local_estoque : null ?>" class="form-campo">
                            </div>
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Depósito</label>
                                <select name="deposito" class="form-campo">
                                    <option value="N">Não</option>
                                    <option value="S">Sim</option>
                                </select>
                            </div>
                            <div class="col-2 mt-1 pt-1">
                                <input type="hidden" name="id_local_estoque" value="<?php echo ($DadosLocalEstoque->id_local_estoque) ? $DadosLocalEstoque->id_local_estoque : null ?>">
                                <input type="submit" value="<?php echo ($DadosLocalEstoque->id_local_estoque) ? "Editar" : "Inserir" ?>" class="btn btn-verde text-uppercase width-100">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="px-2">
            <div class="tabela-responsiva pb-4">
                <table cellpadding="0" cellspacing="0" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th align="center" width="5%">ID</th>
                            <th align="center">Local de Estoque</th>
                            <th align="center">Depósito</th>
                            <th align="center" width="70">Editar</th>
                            <th align="center" width="70">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $DadosLocalEstoque) { ?>
                            <tr>
                                <td align="center"><?php echo $DadosLocalEstoque->id_local_estoque ?></td>
                                <td align="center"><?php echo $DadosLocalEstoque->local_estoque ?></td>
                                <td align="center"><?php echo $DadosLocalEstoque->deposito ?></td>
                                <td align="center"><a href="<?php echo URL_BASE . "localestoque/edit/" . $DadosLocalEstoque->id_local_estoque ?>" class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i> Editar</a> </td>
                                <td align="center"><a href="javascript:;" onclick="return excluir(this)" data-entidade="localestoque" data-id="<?php echo $DadosLocalEstoque->id_local_estoque ?>" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i> Excluir</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>