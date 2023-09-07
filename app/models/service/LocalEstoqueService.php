<?php
namespace app\models\service;

use app\models\validacao\LocalEstoqueValidacao;

class LocalEstoqueService{
    public static function salvar($tb_local_estoque, $campo, $tabela){
        $validacao = LocalEstoqueValidacao::salvar($tb_local_estoque);
        return Service::salvar($tb_local_estoque, $campo, $validacao->listaErros(), $tabela);
    }
}

