<?php

namespace app\models\dao;

use app\core\Model;

class MovimentoDao extends Model
{
    public function lista($LimiteDoResultado)
    {
        $sql = "
            SELECT    
                m.*,
                p.desc_produto,
                tm.id_tipo_movimento,
                tm.desc_tipo_movimento
            FROM tb_movimento_estoque m, tb_produto p, tb_tipo_movimento tm
            WHERE m.id_produto = p.id_produto
            AND m.id_tipo_movimento = tm.id_tipo_movimento
        ";
        if ($LimiteDoResultado) {
            $sql .= " LIMIT $LimiteDoResultado";
        }
        return $this->select($this->db, $sql);
    }
    public function filtro($FiltroMovimentoEstoque)
    {
        $sql = "
            SELECT    
                m.*,
                p.desc_produto,
                tm.id_tipo_movimento,
                tm.desc_tipo_movimento
            FROM tb_movimento_estoque m, tb_produto p, tb_tipo_movimento tm
            WHERE m.id_produto = p.id_produto
            AND m.id_tipo_movimento = tm.id_tipo_movimento
        ";
        if ($FiltroMovimentoEstoque->id_produto) {
            $sql .= " AND m.id_produto = $FiltroMovimentoEstoque->id_produto";
        }
        if ($FiltroMovimentoEstoque->data1) {
            if ($FiltroMovimentoEstoque->data2) {
                $sql .= " AND data_movimento BETWEEN '$FiltroMovimentoEstoque->data1' AND '$FiltroMovimentoEstoque->data2' ";
            } else {
                $sql .= " AND data_movimento = '$FiltroMovimentoEstoque->data1'";
            }
        }
        return $this->select($this->db, $sql);
    }
    public function saldoEstoque($id_produto)
    {
        $sql = "
            SELECT saldoestoque as saldo
                FROM tb_movimento_estoque
                WHERE id_produto = $id_produto
                ORDER BY id_movimento DESC LIMIT 1
            ";
        $resultado = $this->select($this->db, $sql, false);
        return ($resultado) ? $resultado->saldo : 0;
    }
}
