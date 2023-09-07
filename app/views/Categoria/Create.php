<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
    <span><i class="fas fa-plus-circle"></i> <?php echo ($tb_categoria->id_categoria) ? "Editar categoria" : "Nova categoria" ?></span>
    <a href="<?php echo URL_BASE . "categoria" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left"></i> Voltar</a>
</div>

<div class="p-1">
    <?php
    $this->verMsg();
    $this->verErro();
    ?>
</div>
<form action="<?php echo URL_BASE . "categoria/salvar" ?>" method="Post">
    <div class="col-6 d-block m-auto rows px-5 py-">
        <div class="border radius-4 mt-5 px-4">
            <div class="col-12 mb-3 mt-5">
                <label class="text-label">Categoria</label>
                <input type="text" name="categoria" value="<?php echo ($tb_categoria->categoria) ? $tb_categoria->categoria : null ?>" class="form-campo" placeholder="Digite o nome da categoria">
            </div>
            <div class="col-12 mt-3 mb-5">
                <input type="hidden" name="id_categoria" value="<?php echo ($tb_categoria->id_categoria) ? $tb_categoria->id_categoria : null ?>">
                <input type="submit" value="<?php echo ($tb_categoria->id_categoria) ? "Editar categoria" : "Salvar categoria" ?>" class="btn btn-laranja d-block m-auto">
            </div>
        </div>
</form>