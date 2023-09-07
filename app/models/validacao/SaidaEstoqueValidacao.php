<?php

namespace app\models\validacao;

use app\core\Validacao;

class SaidaEstoqueValidacao
{
    public static function salvar($tb_saida_estoque)
    {
        $validacao = new Validacao();

        $validacao->setData("id_produto", $tb_saida_estoque->id_produto);
        $validacao->setData("id_local_estoque", $tb_saida_estoque->id_local_estoque);
        $validacao->setData("qtde_saida", $tb_saida_estoque->qtde_saida);
        $validacao->setData("valor_saida", $tb_saida_estoque->valor_saida);
        $validacao->setData("subtotal_saida", $tb_saida_estoque->subtotal_saida);
        $validacao->setData("data_saida	", $tb_saida_estoque->data_saida);

        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_local_estoque")->isVazio();
        $validacao->getData("qtde_saida")->isVazio();
        $validacao->getData("valor_saida")->isVazio();
        $validacao->getData("subtotal_saida")->isVazio();
        $validacao->getData("data_saida")->isVazio();

        return $validacao;
    }
}
