<?php

namespace app\models\service;

use app\models\validacao\PessoaValidacao;

class PessoaService
{
    public static function salvar($DadosPessoa, $campo, $tabela)
    {
        $validacao = PessoaValidacao::salvar($DadosPessoa);
        return Service::salvar($DadosPessoa, $campo, $validacao->listaErros(), $tabela);
    }
}
