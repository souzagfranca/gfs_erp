<?php

namespace app\models\dao;

use app\core\Model;

class TransferenciaEstoqueDao extends Model
{
    public function listaPorData($data)
    {
        $sql = "
            SELECT 
                t.*, 
                p.desc_produto, 
                lo.local_estoque as origem,
                ld.local_estoque as destino
            FROM tb_transferencia_estoque t, tb_produto p, tb_local_estoque lo, tb_local_estoque ld
            WHERE t.id_produto = p.id_produto
            AND t.id_origem  = lo.id_local_estoque
            AND t.id_destino = ld.id_local_estoque
            AND data_transferencia = '$data'
        ";
        return $this->select($this->db, $sql);
    }
}
