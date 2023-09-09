<?php

namespace app\models\service;

use app\models\validacao\CategoriaValidacao;

class CategoriaService
{
    public static function salvar($CampoData, $campo, $tabela)
    {
        $validacao = CategoriaValidacao::salvar($CampoData);
        return Service::salvar($CampoData, $campo, $validacao->listaErros(), $tabela);
    }
}
