<?php

namespace app\models\dao;

use app\core\Model;

class ProdutoDao extends Model
{
    public function atualizaEstoque($id_produto, $Quantidade)
    {
        $sql = "
            UPDATE tb_produto SET
                estoque_atual = estoque_atual + ($Quantidade),
                estoque_real = estoque_real + ($Quantidade)
                WHERE id_produto = $id_produto
        ";
        $this->select($this->db, $sql);
    }
}
