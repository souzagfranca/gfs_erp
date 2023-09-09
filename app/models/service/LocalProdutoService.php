<?php

namespace app\models\service;

use app\models\dao\LocalProdutoDao;
use app\models\validacao\LocalProdutoValidacao;

class LocalProdutoService
{
    public static function lista()
    {
        $dao = new LocalProdutoDao();
        return $dao->lista();
    }

    public static function atualizaEstoque($id_produto, $id_local_estoque, $Quantidade)
    {
        $dao = new LocalProdutoDao();
        return $dao->atualizaEstoque($id_produto, $id_local_estoque, $Quantidade);
    }

    public static function listaPorProduto($id_produto)
    {
        $dao = new LocalProdutoDao();
        return $dao->listaPorProduto($id_produto);
    }

    public static function getLocalProduto($id_produto, $id_local_estoque)
    {
        $dao = new LocalProdutoDao();
        return $dao->getLocalProdutoDao($id_produto, $id_local_estoque);
    }

    public static function salvar($DadosLocalProduto, $campo, $tabela)
    {
        $validacao = LocalProdutoValidacao::salvar($DadosLocalProduto);
        return Service::salvar($DadosLocalProduto, $campo, $validacao->listaErros(), $tabela);
    }

    public static function salvarEmMassa($id_local_estoque, $tipo)
    {
        if ($tipo == "P") {
            $produtos = Service::get("tb_produto", "eh_produto", "S", true);
        } else if ($tipo == "I") {
            $produtos = Service::get("tb_produto", "eh_insumo", "S", true);
        } else {
            $produtos = Service::lista("tb_produto");
        }

        foreach ($produtos as $tb_produto) {
            if (!self::getLocalProduto($tb_produto->id_produto, $id_local_estoque)) {
                Service::inserir(
                    [
                        "id_produto" => $tb_produto->id_produto,
                        "id_local_estoque" => $id_local_estoque
                    ],
                    "tb_local_produto"
                );
            }
        }
    }
}
