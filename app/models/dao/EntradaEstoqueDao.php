<?php

namespace app\models\dao;

use app\core\Model;

class EntradaEstoqueDao extends Model
{
    public function listaPorData($data)
    {
        $sql = "
            SELECT 
                e.*, 
                p.desc_produto, 
                le.local_estoque
            FROM tb_entrada_estoque e, tb_produto p, tb_local_estoque le
            WHERE e.id_produto = p.id_produto
            AND e.id_local_estoque = le.id_local_estoque
            AND data_entrada = '$data'
        ";
        return $this->select($this->db, $sql);
    }
}
