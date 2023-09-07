<?php

namespace app\models\dao;

use app\core\Model;

class LocalProdutoDao extends Model
{
    public function lista()
    {
        $sql = "
            SELECT
                *
            FROM tb_local_produto lp, tb_produto p, tb_local_estoque le
            WHERE lp.id_produto = p.id_produto
            AND lp.id_local_estoque = le.id_local_estoque
        ";
        return $this->select($this->db, $sql);
    }

    public function getLocalProdutoDao($id_produto, $id_local_estoque)
    {
        $sql = "
            SELECT 
                id_local_estoque,
                estoque
            FROM tb_local_produto
            WHERE id_produto = $id_produto
            AND id_local_estoque = $id_local_estoque
        ";

        return $this->select($this->db, $sql, false);
    }

    public function listaPorProduto($id_produto)
    {
        $sql = "
            SELECT 
                * 
            FROM tb_local_produto lp, tb_produto p, tb_local_estoque le
            WHERE lp.id_produto = p.id_produto
            AND lp.id_local_estoque = le.id_local_estoque
            AND lp.id_produto = $id_produto
        ";
        return $this->select($this->db, $sql);
    }

    public function atualizaEstoque($id_produto, $id_local_estoque, $Quantidade)
    {
        $sql = "
            UPDATE tb_local_produto SET
                estoque = estoque + ($Quantidade)
                WHERE id_produto = $id_produto
                AND id_local_estoque = $id_local_estoque
        ";
        $this->select($this->db, $sql);
    }
}
