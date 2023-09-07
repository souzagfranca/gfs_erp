<?php
namespace app\models\validacao;

use app\core\Validacao;

class LocalEstoqueValidacao{
    public static function salvar($tb_local_estoque){
        $validacao = new Validacao();
        
        $validacao->setData("local_estoque", $tb_local_estoque->local_estoque);
        
        //fazendo a validação
        $validacao->getData("local_estoque")->isVazio();
        
        return $validacao;
        
    }
}

