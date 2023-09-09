<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
    <span><i class="fas fa-plus-circle"></i> <?php echo ($CampoData->id_unidade) ? "Editar unidade de medida" : "Nova unidade de medida" ?></span>
    <a href="<?php echo URL_BASE . "unidade" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left"></i> Voltar</a>
</div>

<div class="p-1">
    <?php
    $this->verMsg();
    $this->verErro();
    ?>
</div>
<form action="<?php echo URL_BASE . "unidade/salvar" ?>" method="Post">
    <div class="col-6 d-block m-auto rows px-5 py-">
        <div class="border radius-4 mt-5 px-4">
            <div class="col-12 mb-3 mt-5">
                <label class="text-label">Unidade de medida</label>
                <input type="text" name="unidade" value="<?php echo ($CampoData->unidade) ? $CampoData->unidade : null ?>" class="form-campo" placeholder="Digite o nome da unidade">
            </div>
            <div class="col-12 mt-3 mb-5">
                <input type="hidden" name="id_unidade" value="<?php echo ($CampoData->id_unidade) ? $CampoData->id_unidade : null ?>">
                <input type="submit" value="<?php echo ($CampoData->id_unidade) ? "Editar unidade" : "Salvar unidade" ?>" class="btn btn-laranja d-block m-auto">
            </div>
        </div>
</form>