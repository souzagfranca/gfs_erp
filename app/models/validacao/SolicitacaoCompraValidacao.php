<?php
namespace app\models\validacao;

use app\core\Validacao;

class CategoriaValidacao{
    public static function salvar($tb_solicitacao_compra){
        $validacao = new Validacao();
        
        $validacao->setData("id_produto", $tb_solicitacao_compra->id_produto);
        $validacao->setData("id_status_solicitacao", $tb_solicitacao_compra->id_status_solicitacao);
        $validacao->setData("qtde_item", $tb_solicitacao_compra->qtde_item);
        $validacao->setData("data_solicitacao", $tb_solicitacao_compra->data_solicitacao);
        
        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_status_solicitacao")->isVazio();
        $validacao->getData("qtde_item")->isVazio();
        $validacao->getData("data_solicitacao")->isVazio();
        
        return $validacao;
        
    }
}

