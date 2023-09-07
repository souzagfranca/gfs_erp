<?php

namespace app\models\service;

use app\models\validacao\PessoaValidacao;

class PessoaService
{
    public static function salvar($tb_pessoa, $campo, $tabela)
    {
        $validacao = PessoaValidacao::salvar($tb_pessoa);
        return Service::salvar($tb_pessoa, $campo, $validacao->listaErros(), $tabela);
    }
}
