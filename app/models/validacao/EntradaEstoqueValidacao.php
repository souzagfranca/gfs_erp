<?php

namespace app\models\validacao;

use app\core\Validacao;

class EntradaEstoqueValidacao
{
    public static function salvar($tb_entrada_estoque)
    {
        $validacao = new Validacao();

        $validacao->setData("id_produto", $tb_entrada_estoque->id_produto);
        $validacao->setData("id_local_estoque", $tb_entrada_estoque->id_local_estoque);
        $validacao->setData("qtde_entrada", $tb_entrada_estoque->qtde_entrada);
        $validacao->setData("valor_entrada", $tb_entrada_estoque->valor_entrada);
        $validacao->setData("subtotal_entrada", $tb_entrada_estoque->subtotal_entrada);
        $validacao->setData("data_entrada	", $tb_entrada_estoque->data_entrada);

        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_local_estoque")->isVazio();
        $validacao->getData("qtde_entrada")->isVazio();
        $validacao->getData("valor_entrada")->isVazio();
        $validacao->getData("subtotal_entrada")->isVazio();
        $validacao->getData("data_entrada")->isVazio();

        return $validacao;
    }
}
