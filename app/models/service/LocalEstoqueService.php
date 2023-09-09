<?php
namespace app\models\service;

use app\models\validacao\LocalEstoqueValidacao;

class LocalEstoqueService{
    public static function salvar($DadosLocalEstoque, $campo, $tabela){
        $validacao = LocalEstoqueValidacao::salvar($DadosLocalEstoque);
        return Service::salvar($DadosLocalEstoque, $campo, $validacao->listaErros(), $tabela);
    }
}

