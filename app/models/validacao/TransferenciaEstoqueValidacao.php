<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\dao\LocalProdutoDao;
use app\models\service\LocalProdutoService;

class TransferenciaEstoqueValidacao
{
    public static function salvar($tb_transferencia_estoque)
    {
        $validacao = new Validacao();

        $validacao->setData("id_produto", $tb_transferencia_estoque->id_produto);
        $validacao->setData("id_origem", $tb_transferencia_estoque->id_origem);
        $validacao->setData("id_destino", $tb_transferencia_estoque->id_destino);
        $validacao->setData("data_transferencia", $tb_transferencia_estoque->data_transferencia);
        $validacao->setData("qtde_transferencia", $tb_transferencia_estoque->qtde_transferencia);

        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_origem")->isVazio();
        $validacao->getData("id_destino")->isVazio();
        $validacao->getData("data_transferencia")->isVazio();
        $validacao->getData("qtde_transferencia")->isVazio();

        if($tb_transferencia_estoque->id_origem == $tb_transferencia_estoque->id_destino){
            $validacao->getData("id_origem")->isUnico(1, "O local de origem não pode ser igual ao de destino.");
        }

        $EstoqueProdutoLocalOrigem = LocalProdutoService::getLocalProduto($tb_transferencia_estoque->id_produto, $tb_transferencia_estoque->id_origem);
        if($EstoqueProdutoLocalOrigem->estoque < $tb_transferencia_estoque->qtde_transferencia){
            $validacao->getData("id_origem")->isUnico(1, "O item não possui saldo suficiente no local de estoque de origem");
        }

        return $validacao;
    }
}
