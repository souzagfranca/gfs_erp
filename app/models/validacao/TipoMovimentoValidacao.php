<?php
namespace app\models\validacao;

use app\core\Validacao;

class TipoMovimentoValidacao{
    public static function salvar($tb_tipo_movimento){
        $validacao = new Validacao();
        
        $validacao->setData("tipo_movimento", $tb_tipo_movimento->tipo_movimento);
        $validacao->setData("ent_sai", $tb_tipo_movimento->ent_sai);
        $validacao->setData("movimenta_estoque", $tb_tipo_movimento->movimenta_estoque);
        
        //fazendo a validação
        $validacao->getData("tipo_movimento")->isVazio();
        $validacao->getData("ent_sai")->isVazio();
        $validacao->getData("movimenta_estoque")->isVazio();
        
        return $validacao;
        
    }
}

