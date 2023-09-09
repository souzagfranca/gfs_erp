<?php
namespace app\models\validacao;

use app\core\Validacao;

class LocalEstoqueValidacao{
    public static function salvar($DadosLocalEstoque){
        $validacao = new Validacao();
        
        $validacao->setData("local_estoque", $DadosLocalEstoque->local_estoque);
        
        //fazendo a validação
        $validacao->getData("local_estoque")->isVazio();
        
        return $validacao;
        
    }
}

