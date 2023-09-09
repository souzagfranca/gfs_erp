<?php

namespace app\models\validacao;

use app\core\Validacao;

class UnidadeValidacao
{
    public static function salvar($CampoData)
    {
        $validacao = new Validacao();

        $validacao->setData("unidade", $CampoData->unidade);

        //fazendo a validação
        $validacao->getData("unidade")->isVazio();

        return $validacao;
    }
}
