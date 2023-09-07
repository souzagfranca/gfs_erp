<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
    <span><i class="fas fa-plus-circle"></i> <?php echo ($tb_tipo_movimento->id_tipo_movimento) ? "Editar Tipo Movimento" : "Cadastrar Tipo Movimento"?></span>
    <a href="<?php echo URL_BASE ."tipomovimento" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left"></i> Voltar</a>
</div>

<div class="p-1">
    <?php $this->verMsg();
    $this->verErro();
    ?>
</div>
<form action="<?php echo URL_BASE . "tipomovimento/salvar" ?>" method="Post">
    <div class="col-6 d-block m-auto rows px-5 py-">
        <div class="border radius-4 mt-5 px-4">
            <div class="col-12 mb-3 mt-5">
                <label class="text-label">Descrição</label>
                <input type="text" name="tipo_movimento" value="<?php echo isset($tb_tipo_movimento->tipo_movimento) ? $tb_tipo_movimento->tipo_movimento : null ?>" class="form-campo" placeholder="Digite o nome da unidade">
            </div>
            <div class="col-12 mb-3">
                <label class="text-label">Tipo</label>
                <select class="form-campo" name="ent_sai">
                    <option value="">Selecione</option>
                    <option value="E" <?php echo ($tb_tipo_movimento->ent_sai == "E") ? "selected" : "" ?>>Entrada</option>
                    <option value="S" <?php echo ($tb_tipo_movimento->ent_sai == "S") ? "selected" : "" ?>>Saída</option>
                </select>
            </div>
            <div class="col-12 mb-3">
                <label class="text-label">Movimenta Estoque</label>
                <select class="form-campo" name="movimenta_estoque">
                    <option value="">Selecione</option>
                    <option value="S" <?php echo ($tb_tipo_movimento->movimenta_estoque == "S") ? "selected" : "" ?>>Sim</option>
                    <option value="N" <?php echo ($tb_tipo_movimento->movimenta_estoque == "N") ? "selected" : "" ?>>Não</option>
                </select>
            </div>
            <div class="col-12 mt-3 mb-5">
                <input type="hidden" name="id_tipo_movimento" value="<?php echo ($tb_tipo_movimento->id_tipo_movimento) ? $tb_tipo_movimento->id_tipo_movimento : null ?>">
                <input type="submit" value="<?php echo ($tb_tipo_movimento->id_tipo_movimento) ? "Editar" : "Salvar"?>" class="btn btn-laranja d-block m-auto">
            </div>

        </div>
</form>