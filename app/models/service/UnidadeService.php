<?php

namespace app\models\service;

use app\models\validacao\UnidadeValidacao;

class UnidadeService
{
    public static function salvar($CampoData, $campo, $tabela)
    {
        $validacao = UnidadeValidacao::salvar($CampoData);
        return Service::salvar($CampoData, $campo, $validacao->listaErros(), $tabela);
    }
}
