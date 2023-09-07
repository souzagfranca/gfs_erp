<?php

namespace app\models\service;

use app\models\dao\TransferenciaEstoqueDao;
use app\models\entidade\Movimento;
use app\models\validacao\TransferenciaEstoqueValidacao;

class TransferenciaEstoqueService
{
    public static function salvar($tb_transferencia_estoque, $campo, $tabela)
    {
        $validacao = TransferenciaEstoqueValidacao::salvar($tb_transferencia_estoque);
        $id_transferencia = Service::salvar($tb_transferencia_estoque, $campo, $validacao->listaErros(), $tabela);
        if ($id_transferencia) {
            //Saída do produto
            $MovimentoEstoque = new Movimento();
            $MovimentoEstoque->setId_local_estoque($tb_transferencia_estoque->id_origem);
            $MovimentoEstoque->setId_tipo_movimento(16);
            $MovimentoEstoque->setId_transferencia($id_transferencia);
            $MovimentoEstoque->setEntrada_saida("S");
            $MovimentoEstoque->setId_produto($tb_transferencia_estoque->id_produto);
            $MovimentoEstoque->setData_movimento($tb_transferencia_estoque->data_transferencia);
            $MovimentoEstoque->setQtde_movimento($tb_transferencia_estoque->qtde_transferencia);
            $MovimentoEstoque->setValor_movimento(0);
            $MovimentoEstoque->setSubtotal_movimento(0);
            $MovimentoEstoque->setDescricao("Transferencia ID: " . $id_transferencia);
            MovimentoService::inserir($MovimentoEstoque, 100);

            //Entrada do produto
            $MovimentoEstoque = new Movimento();
            $MovimentoEstoque->setId_local_estoque($tb_transferencia_estoque->id_destino);
            $MovimentoEstoque->setId_tipo_movimento(15);
            $MovimentoEstoque->setId_transferencia($id_transferencia);
            $MovimentoEstoque->setEntrada_saida("E");
            $MovimentoEstoque->setId_produto($tb_transferencia_estoque->id_produto);
            $MovimentoEstoque->setData_movimento($tb_transferencia_estoque->data_transferencia);
            $MovimentoEstoque->setQtde_movimento($tb_transferencia_estoque->qtde_transferencia);
            $MovimentoEstoque->setValor_movimento(0);
            $MovimentoEstoque->setSubtotal_movimento(0);
            $MovimentoEstoque->setDescricao("Transferencia ID: " . $id_transferencia);
            MovimentoService::inserir($MovimentoEstoque, 100);
        }

        return $id_transferencia;

    }

    public static function listaPorData($data)
    {
        $dao = new TransferenciaEstoqueDao();
        return $dao->listaPorData($data);
    }
}
