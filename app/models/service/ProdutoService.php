<?php

namespace app\models\service;

use app\models\dao\ProdutoDao;
use app\models\validacao\ProdutoValidacao;

class ProdutoService
{
    public static function salvar($tb_produto, $campo, $tabela)
    {
        $validacao = ProdutoValidacao::salvar($tb_produto);
        return Service::salvar($tb_produto, $campo, $validacao->listaErros(), $tabela);
    }

    public static function atualizaEstoque($id_produto, $quantidade)
    {
        $dao = new ProdutoDao();
        return $dao->atualizaEstoque($id_produto, $quantidade);
    }
}
