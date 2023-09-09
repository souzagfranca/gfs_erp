<?php
namespace app\models\validacao;

use app\core\Validacao;

class CategoriaValidacao{
    public static function salvar($CampoData){
        $validacao = new Validacao();
        
        $validacao->setData("desc_categoria", $CampoData->desc_categoria);
        
        //fazendo a validação
        $validacao->getData("desc_categoria")->isVazio();
        
        return $validacao;
        
    }
}

