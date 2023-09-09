<?php
namespace app\models\validacao;

use app\core\Validacao;

class ProdutoValidacao{
    public static function salvar($DadosProduto){
        $validacao = new Validacao();
        
        $validacao->setData("desc_produto", $DadosProduto->desc_produto);
        $validacao->setData("id_categoria", $DadosProduto->id_categoria);
        $validacao->setData("id_unidade", $DadosProduto->id_unidade);
        $validacao->setData("vr_venda", $DadosProduto->vr_venda);
        $validacao->setData("eh_produto", $DadosProduto->eh_produto);
        $validacao->setData("eh_insumo", $DadosProduto->eh_insumo);
        $validacao->setData("eh_promocao", $DadosProduto->eh_promocao);
        $validacao->setData("eh_maisvendido", $DadosProduto->eh_maisvendido);
        $validacao->setData("eh_lancamento", $DadosProduto->eh_lancamento);
        
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

