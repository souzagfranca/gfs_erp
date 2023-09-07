<?php

namespace app\models\service;

use app\models\dao\EntradaEstoqueDao;
use app\models\entidade\Movimento;
use app\models\validacao\EntradaEstoqueValidacao;

class EntradaEstoqueService
{
    public static function salvar($tb_entrada_estoque, $campo, $tabela)
    {
        $validacao = EntradaEstoqueValidacao::salvar($tb_entrada_estoque);
        $id_entrada = Service::salvar($tb_entrada_estoque, $campo, $validacao->listaErros(), $tabela);

        if ($id_entrada) {
            //Localizar o estoque anterior;
            $mov = new Movimento();
            $mov->setId_local_estoque($tb_entrada_estoque->id_local_estoque);
            $mov->setId_tipo_movimento(1);
            $mov->setId_entrada_avulsa($id_entrada);
            $mov->setEntrada_saida("E");
            $mov->setId_produto($tb_entrada_estoque->id_produto);
            $mov->setData_movimento($tb_entrada_estoque->data_entrada);
            $mov->setQtde_movimento($tb_entrada_estoque->qtde_entrada);
            $mov->setValor_movimento($tb_entrada_estoque->valor_entrada);
            $mov->setSubtotal_movimento($tb_entrada_estoque->subtotal_entrada);
            $mov->setDescricao("Entrada Avulsa ID: " . $id_entrada);

            MovimentoService::inserir($mov);
        }
    }

    public static function listaPorData($data)
    {
        $dao = new EntradaEstoqueDao();
        return $dao->listaPorData($data);
    }
}
