<?php
namespace app\models\validacao;

use app\core\Validacao;

class ProdutoValidacao{
    public static function salvar($tb_produto){
        $validacao = new Validacao();
        
        $validacao->setData("desc_produto", $tb_produto->desc_produto);
        $validacao->setData("id_categoria", $tb_produto->id_categoria);
        $validacao->setData("id_unidade", $tb_produto->id_unidade);
        $validacao->setData("vr_venda", $tb_produto->vr_venda);
        $validacao->setData("eh_produto", $tb_produto->eh_produto);
        $validacao->setData("eh_insumo", $tb_produto->eh_insumo);
        $validacao->setData("eh_promocao", $tb_produto->eh_promocao);
        $validacao->setData("eh_maisvendido", $tb_produto->eh_maisvendido);
        $validacao->setData("eh_lancamento", $tb_produto->eh_lancamento);
        
        //fazendo a validação
        $validacao->getData("desc_produto")->isVazio();
        $validacao->getData("id_categoria")->isVazio();
        $validacao->getData("id_unidade")->isVazio();
        $validacao->getData("vr_venda")->isVazio();
        $validacao->getData("eh_produto")->isVazio();
        $validacao->getData("eh_insumo")->isVazio();
        $validacao->getData("eh_promocao")->isVazio();
        $validacao->getData("eh_maisvendido")->isVazio();
        $validacao->getData("eh_lancamento")->isVazio();
        
        return $validacao;
        
    }
}

