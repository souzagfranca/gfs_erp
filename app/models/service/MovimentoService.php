<?php

namespace app\models\service;

use app\models\dao\MovimentoDao;
use app\models\entidade\Movimento;

class MovimentoService
{
    public static function filtro($FiltroMovimentoEstoque)
    {
        $dao = new MovimentoDao();
        return $dao->filtro($FiltroMovimentoEstoque);
    }
    public static function lista($LimiteDoResultado = null)
    {
        $dao = new MovimentoDao();
        return $dao->lista($LimiteDoResultado);
    }

    public static function saldoEstoque($id_produto)
    {
        $dao = new MovimentoDao();
        return $dao->saldoEstoque($id_produto);
    }

    public static function inserir(Movimento $MovimentoEstoque, $TipoMovimento = 1, $MovimentoLocalEstoque = true)
    {
        //Tipos de movimento: 1-Atualiza estoque | 2-Reserva Estoque | 3-Exclui Estoque

        //Localizer o estoque anterior;
        $SaldoAnteriorProduto = self::saldoEstoque($MovimentoEstoque->getId_produto());
        $QuantidadeMovimento = ($MovimentoEstoque->getEntrada_saida() == "E") ? $MovimentoEstoque->getQtde_movimento() : -$MovimentoEstoque->getQtde_movimento();
        $SaldoAtualizado = $SaldoAnteriorProduto + ($QuantidadeMovimento);
        $Saldo = ($MovimentoEstoque->getId_tipo_movimento() == 16 || $MovimentoEstoque->getId_tipo_movimento() == 15) ? $SaldoAnteriorProduto : $SaldoAtualizado;
        $MovimentoEstoque->setSaldoestoque($Saldo);

        Service::inserir($MovimentoEstoque->toArray(), "tb_movimento_estoque");
        if ($TipoMovimento == 1) {
            ProdutoService::atualizaEstoque($MovimentoEstoque->getId_produto(), $QuantidadeMovimento);
        }

        if ($MovimentoLocalEstoque) {
            LocalProdutoService::atualizaEstoque($MovimentoEstoque->getId_produto(), $MovimentoEstoque->getId_local_estoque(), $QuantidadeMovimento);
        }
    }
}
