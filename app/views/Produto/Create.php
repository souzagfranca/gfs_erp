<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
    <span><i class="fas fa-plus-circle"></i> <?php echo ($DadosProduto->id_produto) ? "Editar produto" : "Novo produto" ?></span>
    <a href="<?php echo URL_BASE . "produto" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left"></i> Voltar</a>
</div>
<div class="p-1">
    <?php
    $this->verMsg();
    $this->verErro();
    $imagem = $DadosProduto->imagem ? $DadosProduto->imagem : "semproduto.png";
    ?>
</div>
<form action="<?php echo URL_BASE . "produto/salvar" ?>" method="Post">
    <div class="rows p-4">
        <div class="col-4">
            <div class="py-1 px-2 mt-3 border text-center  campo-upload">
                <label for="arquivo">
                    <img src="<?php echo URL_IMAGEM . $imagem ?>" class="img-fluido opaco" id="imgUp">
                    <span>Inserir produto</span>
                </label>
                <input type="file" name="arquivo" id="arquivo" onchange="pegaArquivo(this.files)">
            </div>
        </div>
        <div class="col-8 px-2">
            <div class="rows">
                <div class="col-8 mb-3">
                    <label class="text-label">Descrição do produto</label>
                    <input type="text" value="<?php echo isset($DadosProduto->desc_produto) ? $DadosProduto->desc_produto : null ?>" name="desc_produto" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-4 mb-3">
                    <label class="text-label">Código Barra</label>
                    <input type="text" name="codigo_barra" value="<?php echo isset($DadosProduto->codigo_barra) ? $DadosProduto->codigo_barra : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>

                <div class="col-4 mb-3">
                    <label class="text-label">Categoria</label>
                    <select class="form-campo" name="id_categoria">
                        <option value="">Selecione</option>
                        <?php
                        foreach ($categorias as $DadosCategoria) {
                            $selecionado = ($DadosCategoria->id_categoria == $DadosProduto->id_categoria) ? "selected" : "";
                            echo "<option value='$DadosCategoria->id_categoria' $selecionado>$DadosCategoria->desc_categoria</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-4 mb-3">
                    <label class="text-label">Unidade de medida</label>
                    <select class="form-campo" name="id_unidade">
                        <option value="">Selecione</option>
                        <?php
                        foreach ($unidades as $tb_unidade_medida) {
                            $selecionado = ($tb_unidade_medida->id_unidade == $DadosProduto->id_unidade) ? "selected" : "";
                            echo "<option value='$tb_unidade_medida->id_unidade' $selecionado>$tb_unidade_medida->unidade</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-4 mb-3">
                    <label class="text-label">Valor de Venda</label>
                    <input type="text" name="vr_venda" value="<?php echo isset($DadosProduto->vr_venda) ? $DadosProduto->vr_venda : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>

                <div class="col-3 mb-3">
                    <label class="text-label">Produto</label>
                    <select class="form-campo" name="eh_produto">
                        <option value="">Selecione</option>
                        <option value="S" <?php echo ($DadosProduto->eh_produto == "S") ? "selected" : "" ?>>Sim</option>
                        <option value="N" <?php echo ($DadosProduto->eh_produto == "N") ? "selected" : "" ?>>Não</option>
                    </select>
                </div>

                <div class="col-3 mb-3">
                    <label class="text-label">Insumo</label>
                    <select class="form-campo" name="eh_insumo">
                        <option value="">Selecione</option>
                        <option value="S" <?php echo ($DadosProduto->eh_insumo == "S") ? "selected" : "" ?>>Sim</option>
                        <option value="N" <?php echo ($DadosProduto->eh_insumo == "N") ? "selected" : "" ?>>Não</option>
                    </select>
                </div>

                <div class="col-3 mb-3">
                    <label class="text-label">Promoção</label>
                    <select class="form-campo" name="eh_promocao">
                        <option value="">Selecione</option>
                        <option value="S" <?php echo ($DadosProduto->eh_promocao == "S") ? "selected" : "" ?>>Sim</option>
                        <option value="N" <?php echo ($DadosProduto->eh_promocao == "N") ? "selected" : "" ?>>Não</option>
                    </select>
                </div>

                <div class="col-3 mb-3">
                    <label class="text-label">Mais vendido</label>
                    <select class="form-campo" name="eh_maisvendido">
                        <option value="">Selecione</option>
                        <option value="S" <?php echo ($DadosProduto->eh_maisvendido == "S") ? "selected" : "" ?>>Sim</option>
                        <option value="N" <?php echo ($DadosProduto->eh_maisvendido == "N") ? "selected" : "" ?>>Não</option>
                    </select>
                </div>

                <div class="col-3 mb-3">
                    <label class="text-label">Lançamento</label>
                    <select class="form-campo" name="eh_lancamento">
                        <option value="">Selecione</option>
                        <option value="S" <?php echo ($DadosProduto->eh_lancamento == "S") ? "selected" : "" ?>>Sim</option>
                        <option value="N" <?php echo ($DadosProduto->eh_lancamento == "N") ? "selected" : "" ?>>Não</option>
                    </select>
                </div>

                <div class="col-3 mb-3">
                    <label class="text-label">Valor Custo Atual</label>
                    <input type="text" name="vr_custo_atual" value="<?php echo isset($DadosProduto->vr_custo_atual) ? $DadosProduto->vr_custo_atual : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-3 mb-3">
                    <label class="text-label">Valor Custo Médio</label>
                    <input type="text" name="vr_custo_medio" value="<?php echo isset($DadosProduto->vr_custo_medio) ? $DadosProduto->vr_custo_medio : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-3 mb-3">
                    <label class="text-label">Valor Custo Produção</label>
                    <input type="text" name="vr_custo_producao" value="<?php echo isset($DadosProduto->vr_custo_producao) ? $DadosProduto->vr_custo_producao : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-4 mb-3">
                    <label class="text-label">Estoque Inicial</label>
                    <input type="text" name="estoque_inicial" value="<?php echo isset($DadosProduto->estoque_inicial) ? $DadosProduto->estoque_inicial : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-4 mb-3">
                    <label class="text-label">Estoque Mínimo</label>
                    <input type="text" name="estoque_minimo" value="<?php echo isset($DadosProduto->estoque_minimo) ? $DadosProduto->estoque_minimo : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-4 mb-3">
                    <label class="text-label">Estoque Máximo</label>
                    <input type="text" name="estoque_maximo" value="<?php echo isset($DadosProduto->estoque_maximo) ? $DadosProduto->estoque_maximo : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-4 mb-3">
                    <label class="text-label">Estoque Atual</label>
                    <input type="text" name="estoque_atual" value="<?php echo isset($DadosProduto->estoque_atual) ? $DadosProduto->estoque_atual : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-4 mb-3">
                    <label class="text-label">Estoque Reservado</label>
                    <input type="text" name="estoque_reservado" value="<?php echo isset($DadosProduto->estoque_reservado) ? $DadosProduto->estoque_reservado : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>
                <div class="col-4 mb-3">
                    <label class="text-label">Estoque Real</label>
                    <input type="text" name="estoque_real" value="<?php echo isset($DadosProduto->estoque_real) ? $DadosProduto->estoque_real : null ?>" placeholder="Digite aqui..." class="form-campo">
                </div>

                <div class="col-12 mt-2">
                    <input type="hidden" name="id_produto" value="<?php echo isset($DadosProduto->id_produto) ? $DadosProduto->id_produto : null ?>">
                    <input type="submit" value="<?php echo ($DadosProduto->id_produto) ? "Editar produto" : "Salvar produto" ?>" class="btn btn-laranja btn-medio d-block m-auto">
                </div>
            </div>
        </div>
    </div>
</form>