<?php

namespace app\models\service;

use app\models\dao\SaidaEstoqueDao;
use app\models\entidade\Movimento;
use app\models\validacao\SaidaEstoqueValidacao;

class SaidaEstoqueService
{
    public static function salvar($tb_saida_estoque, $campo, $tabela)
    {
        $validacao = SaidaEstoqueValidacao::salvar($tb_saida_estoque);
        $id_saida = Service::salvar($tb_saida_estoque, $campo, $validacao->listaErros(), $tabela);

        if ($id_saida) {
            //Localizer o estoque anterior;
            $mov = new Movimento();
            $mov->setId_local_estoque($tb_saida_estoque->id_local_estoque);
            $mov->setId_tipo_movimento(5);
            $mov->setId_entrada_avulsa($id_saida);
            $mov->setEntrada_saida("S");
            $mov->setId_produto($tb_saida_estoque->id_produto);
            $mov->setData_movimento($tb_saida_estoque->data_saida);
            $mov->setQtde_movimento($tb_saida_estoque->qtde_saida);
            $mov->setValor_movimento($tb_saida_estoque->valor_saida);
            $mov->setSubtotal_movimento($tb_saida_estoque->subtotal_saida);
            $mov->setDescricao("Saida Avulsa ID: " . $id_saida);

            MovimentoService::inserir($mov);
        }
    }

    public static function listaPorData($data)
    {
        $dao = new SaidaEstoqueDao();
        return $dao->listaPorData($data);
    }
}
