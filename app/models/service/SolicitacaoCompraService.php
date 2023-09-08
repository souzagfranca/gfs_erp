<?php

namespace app\models\service;

use app\models\validacao\CategoriaValidacao;

class CategoriaService
{
    public static function salvar($tb_categoria, $campo, $tabela)
    {
        $validacao = CategoriaValidacao::salvar($tb_categoria);
        return Service::salvar($tb_categoria, $campo, $validacao->listaErros(), $tabela);
    }
}
