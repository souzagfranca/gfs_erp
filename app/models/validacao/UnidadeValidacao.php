<?php

namespace app\models\validacao;

use app\core\Validacao;

class UnidadeValidacao
{
    public static function salvar($tb_unidade_medida)
    {
        $validacao = new Validacao();

        $validacao->setData("unidade", $tb_unidade_medida->unidade);

        //fazendo a validação
        $validacao->getData("unidade")->isVazio();

        return $validacao;
    }
}
