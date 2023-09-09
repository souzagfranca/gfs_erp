<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\LocalProdutoService;

class LocalProdutoValidacao
{
    public static function salvar($DadosLocalProduto)
    {
        $validacao = new Validacao();

        $validacao->setData("id_local_estoque", $DadosLocalProduto->id_local_estoque);
        $validacao->setData("id_produto", $DadosLocalProduto->id_produto);

        //fazendo a validação
        $validacao->getData("id_local_estoque")->isVazio();
        $validacao->getData("id_produto")->isVazio();

        if (!$DadosLocalProduto->id_local_produto) {
            $tem = LocalProdutoService::getLocalProduto($DadosLocalProduto->id_produto, $DadosLocalProduto->id_local_estoque);
            if ($tem) {
                $validacao->getData("id_local_estoque")->isUnico(1, "Já existe um produto neste local de estoque");
            }
        }

        return $validacao;
    }
}
