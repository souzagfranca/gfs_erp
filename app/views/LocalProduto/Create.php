<div class="rows">
    <div class="col-12">
        <div class="caixa">
            <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Local do Produto </span>

            </div>

            <div class="p-1">
                <?php
                $this->verMsg();
                $this->verErro();
                ?>
            </div>
            <form action="<?php echo URL_BASE . "localproduto/salvar" ?>" method="Post">

                <div class="px-2 pt-2">
                    <div class="bg-padrao border radius-4 mt-2 p-3 radius-4">
                        <div class="rows">
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Produto</label>
                                <select class="form-campo" name="id_produto">
                                    <option>Selecione o produto</option>
                                    <?php foreach ($produtos as $produto) {
                                        $selecionado = ($produto->id_produto == $tb_local_produto->id_produto) ? "selected" : "";
                                        echo "<option value='$produto->id_produto' $selecionado>$produto->produto</option>";
                                    ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Local de Estoque</label>
                                <select class="form-campo" name="id_local_estoque">
                                    <option>Selecione o local</option>
                                    <?php foreach ($locais as $tb_local_estoque) {
                                        $selecionado = ($tb_local_estoque->id_local_estoque == $tb_local_produto->id_local_estoque) ? "selected" : "";
                                        echo "<option value='$tb_local_estoque->id_local_estoque' $selecionado>$tb_local_estoque->local_estoque</option>";
                                    ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Em massa</label>
                                <select class="form-campo" name="em_massa">
                                    <option value="N">Não</option>
                                    <option value="S">Sim</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Tipo</label>
                                <select class="form-campo" name="tipo">
                                    <option>Selecione</option>
                                    <option value="">Todos</option>
                                    <option value="P">Produtos</option>
                                    <option value="I">Insumos</option>
                                </select>
                            </div>

                            <div class="col-2 mt-1 pt-1">
                                <input type="hidden" name="id_local_produto" value="<?php echo ($tb_local_produto->id_local_produto) ? $tb_local_produto->id_local_produto : null ?>">
                                <input type="submit" value="<?php echo ($tb_local_produto->id_local_produto) ? "Editar" : "Inserir" ?>" class="btn btn-verde text-uppercase width-100">
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
                            <th align="center">Produto</th>
                            <th align="center">Local de Estoque</th>
                            <th align="center">Estoque</th>
                            <th align="center" width="70">Editar</th>
                            <th align="center" width="70">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $localproduto) { ?>
                            <tr>
                                <td align="center"><?php echo $localproduto->id_local_produto ?></td>
                                <td align="center"><?php echo $localproduto->produto ?></td>
                                <td align="center"><?php echo $localproduto->local_estoque ?></td>
                                <td align="center"><?php echo $localproduto->estoque ?></td>
                                <td align="center"><a href="<?php echo URL_BASE . "localproduto/edit/" . $localproduto->id_local_produto ?>" class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i> Editar</a> </td>
                                <td align="center"><a href="javascript:;" onclick="return excluir(this)" data-entidade="localproduto" data-id="<?php echo $localproduto->id_local_produto ?>" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i> Excluir</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>