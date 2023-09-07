<?php

namespace app\models\service;

use app\models\validacao\UnidadeValidacao;

class UnidadeService
{
    public static function salvar($tb_unidade_medida, $campo, $tabela)
    {
        $validacao = UnidadeValidacao::salvar($tb_unidade_medida);
        return Service::salvar($tb_unidade_medida, $campo, $validacao->listaErros(), $tabela);
    }
}
