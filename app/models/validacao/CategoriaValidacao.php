<?php
namespace app\models\validacao;

use app\core\Validacao;

class CategoriaValidacao{
    public static function salvar($tb_categoria){
        $validacao = new Validacao();
        
        $validacao->setData("categoria", $tb_categoria->categoria);
        
        //fazendo a validação
        $validacao->getData("categoria")->isVazio();
        
        return $validacao;
        
    }
}

