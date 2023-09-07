<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
    <span><i class="fas fa-plus-circle" aria-hidden="true"></i> <?php echo ($tb_pessoa->id_pessoa) ? "Editar cadastro" : "Novo cliente/fornecedor" ?></span>
    <a href="<?php echo URL_BASE . "pessoa" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left" aria-hidden="true"></i> Voltar</a>
</div>
<div class="p-1">
    <?php
    $this->verMsg();
    $this->verErro();
    ?>
</div>
<form action="<?php echo URL_BASE . "pessoa/salvar" ?>" method="Post">
    <div id="tab">
        <ul>
            <li><a href="#tab-1">Dados gerais</a></li>
            <li><a href="#tab-2">Endereço</a></li>
            <li><a href="#tab-3">Informações adicionais</a></li>
        </ul>
        <div id="tab-1">
            <div class="p-2">
                <span class="d-block mt-4 mb-4 h4 border-bottom text-uppercase">Informações básicas</span>
                <div class="rows">
                    <div class="col-12 mb-4">
                        <span class="h5 d-block text-upp">Marque os tipos desejados:</span>
                        <div class="rows itens-check px-3">
                            <div>
                                <input type="checkbox" name="eh_cliente" class="form-control tipo" id="cliente" value="S" <?php echo ($tb_pessoa->eh_cliente == "S") ? "checked" : null  ?>> <label class="p-2 mr-1" for="cliente"><i class="fas fa-user"></i> Cliente</label>
                            </div>
                            <div>
                                <input type="checkbox" name="eh_fornecedor" class="form-control tipo" id="fornecedor" value="S" <?php echo ($tb_pessoa->eh_fornecedor == "S") ? "checked" : null  ?>> <label class="p-2 mr-1" for="fornecedor"><i class="fas fa-cart-arrow-down"></i> Fornecedor</label>
                            </div>
                            <div>
                                <input type="checkbox" name="eh_transportador" class="form-control tipo" id="transportador" value="S" <?php echo ($tb_pessoa->eh_transportador == "S") ? "checked" : null  ?>> <label class="p-2" for="transportador"><i class="fas fa-truck"></i> Transportador</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mb-3">
                        <label class="text-label">Nome</label>
                        <input type="text" name="nome" value="<?php echo ($tb_pessoa->nome) ? $tb_pessoa->nome : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="text-label">Nome Fantasia</label>
                        <input type="text" name="nome_fantasia" value="<?php echo ($tb_pessoa->nome_fantasia) ? $tb_pessoa->nome_fantasia : null ?>" class="form-campo">
                    </div>

                    <div class="col-3 mb-3">
                        <label class="text-label">CPF</label>
                        <input type="text" name="cpf" value="<?php echo ($tb_pessoa->cpf) ? $tb_pessoa->cpf : null ?>" placeholder="Digite aqui..." class="form-campo mascara-cpf">
                    </div>
                    <div class="col-3 mb-3">
                        <label class="text-label">RG</label>
                        <input type="text" name="rg" value="<?php echo ($tb_pessoa->rg) ? $tb_pessoa->rg : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-3 mb-3">
                        <label class="text-label">CNPJ</label>
                        <input type="text" name="cnpj" value="<?php echo ($tb_pessoa->cnpj) ? $tb_pessoa->cnpj : null ?>" placeholder="Digite aqui..." class="form-campo mascara-cnpj">
                    </div>
                    <div class="col-3 mb-3">
                        <label class="text-label">Insc. Estadual</label>
                        <input type="text" name="ie" value="<?php echo ($tb_pessoa->ie) ? $tb_pessoa->ie : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-3 mb-3">
                        <label class="text-label">Telefone</label>
                        <input type="text" name="fone" value="<?php echo ($tb_pessoa->fone) ? $tb_pessoa->fone : null ?>" placeholder="Digite aqui..." class="form-campo mascara-fone">
                    </div>
                    <div class="col-3 mb-3">
                        <label class="text-label">Celular</label>
                        <input type="text" name="celular" value="<?php echo ($tb_pessoa->celular) ? $tb_pessoa->celular : null ?>" placeholder="Digite aqui..." class="form-campo mascara-celular">
                    </div>
                    <div class="col-4 mb-3">
                        <label class="text-label">E-mail</label>
                        <input type="text" name="email" value="<?php echo ($tb_pessoa->email) ? $tb_pessoa->email : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-2 mb-3">
                        <label class="text-label">Senha</label>
                        <input type="password" name="senha" value="<?php echo ($tb_pessoa->senha) ? $tb_pessoa->senha : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-3 mb-3">
                        <label class="text-label">Data Cadastro</label>
                        <input type="date" name="data_cadastro" value="<?php echo ($tb_pessoa->data_cadastro) ? $tb_pessoa->data_cadastro : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-2">
                        <label class="text-label">Ativo</label>
                        <select class="form-campo" name="ativo">
                            <option value="S" <?php echo ($tb_pessoa->ativo == "S") ? "selected" : "" ?>>Sim</option>
                            <option value="N" <?php echo ($tb_pessoa->ativo == "N") ? "selected" : "" ?>>Não</option>
                        </select>
                    </div>


                </div>
            </div>
        </div>

        <div id="tab-2">
            <div class="p-2">
                <span class="d-block mt-4 h4 border-bottom text-uppercase">Endereço</span>
                <div class="rows">
                    <div class="col-2 mb-3">
                        <label class="text-label">CEP</label>
                        <div class="input-grupo">
                            <input type="text" value="<?php echo ($tb_pessoa->cep) ? $tb_pessoa->cep : null ?>" name="cep" id="cep" placeholder="Digite aqui..." class="form-campo mascara-cep busca_cep">
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="text-label">Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro" value="<?php echo ($tb_pessoa->logradouro) ? $tb_pessoa->logradouro : null ?>" placeholder="Digite aqui..." class="form-campo rua">
                    </div>
                    <div class="col-4 mb-3">
                        <label class="text-label">Complemento</label>
                        <input type="text" name="complemento" id="complemento" value="<?php echo ($tb_pessoa->complemento) ? $tb_pessoa->complemento : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-1 mb-4">
                        <label class="text-label">Numero</label>
                        <input type="text" name="numero" id="numero" value="<?php echo ($tb_pessoa->numero) ? $tb_pessoa->numero : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="text-label">Bairro</label>
                        <input type="text" name="bairro" id="bairro" value="<?php echo ($tb_pessoa->bairro) ? $tb_pessoa->bairro : null ?>" placeholder="Digite aqui..." class="form-campo bairro">
                    </div>
                    <div class="col-1 mb-3">
                        <label class="text-label">UF</label>
                        <div class="input-grupo">
                            <input type="text" value="<?php echo ($tb_pessoa->uf) ? $tb_pessoa->uf : null ?>" name="uf" id="uf" class="form-campo estado">
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <label class="text-label">Cidade</label>
                        <div class="input-grupo">
                            <input type="text" value="<?php echo ($tb_pessoa->cidade) ? $tb_pessoa->cidade : null ?>" name="cidade" id="cidade" class="form-campo cidade">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="tab-3">
            <div class="p-2">
                <span class="d-block mt-4 h4 border-bottom text-uppercase">Informações Adicionais</span>
                <div class="rows">
                    <div class="col-4 mb-3">
                        <label class="text-label">Insc. Municipal</label>
                        <input type="text" name="im" value="<?php echo ($tb_pessoa->im) ? $tb_pessoa->im : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-4 mb-3">
                        <label class="text-label">Suframa</label>
                        <input type="text" name="suframa" value="<?php echo ($tb_pessoa->suframa) ? $tb_pessoa->suframa : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-4 mb-3">
                        <label class="text-label">Cód. Estrangeiro</label>
                        <input type="text" name="cod_estrangeiro" value="<?php echo ($tb_pessoa->cod_estrangeiro) ? $tb_pessoa->cod_estrangeiro : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>
                    <div class="col-4 mb-3">
                        <label class="text-label">IE Subst. Trib.</label>
                        <input type="text" name="ie_subt_trib" value="<?php echo ($tb_pessoa->ie_subt_trib) ? $tb_pessoa->ie_subt_trib : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 text-center pb-4">
        <input type="hidden" name="id_pessoa" value="<?php echo ($tb_pessoa->id_pessoa) ? $tb_pessoa->id_pessoa : null ?>">
        <input type="submit" value="<?php echo ($tb_pessoa->id_pessoa) ? "Editar" : "Salvar" ?>" class="btn btn-laranja m-auto">
    </div>
</form>