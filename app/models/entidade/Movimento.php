<?php

namespace app\models\entidade;

class Movimento
{
    private $id_movimento;
    private $id_local_estoque;
    private $id_tipo_movimento;
    private $id_produto;
    private $id_ordem_compra;
    private $id_pedido;
    private $id_entrada_avulsa;
    private $id_saida_avulsa;
    private $id_ordem_producao;
    private $id_transferencia;
    private $entrada_saida;
    private $data_movimento;
    private $qtde_movimento;
    private $valor_movimento;
    private $subtotal_movimento;
    private $descricao;
    private $saldoestoque;

    public function getId_movimento()
    {
        return $this->id_movimento;
    }

    public function setId_movimento($id_movimento)
    {
        $this->id_movimento = $id_movimento;
    }

    public function getId_local_estoque()
    {
        return $this->id_local_estoque;
    }

    public function setId_local_estoque($id_local_estoque)
    {
        $this->id_local_estoque = $id_local_estoque;
    }

    public function getId_tipo_movimento()
    {
        return $this->id_tipo_movimento;
    }

    public function setId_tipo_movimento($id_tipo_movimento)
    {
        $this->id_tipo_movimento = $id_tipo_movimento;
    }

    public function getId_produto()
    {
        return $this->id_produto;
    }

    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;
    }

    public function getId_ordem_compra()
    {
        return $this->id_ordem_compra;
    }

    public function setId_ordem_compra($id_ordem_compra)
    {
        $this->id_ordem_compra = $id_ordem_compra;
    }

    public function getId_pedido()
    {
        return $this->id_pedido;
    }

    public function setId_pedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }

    public function getId_entrada_avulsa()
    {
        return $this->id_entrada_avulsa;
    }

    public function setId_entrada_avulsa($id_entrada_avulsa)
    {
        $this->id_entrada_avulsa = $id_entrada_avulsa;
    }

    public function getId_saida_avulsa()
    {
        return $this->id_saida_avulsa;
    }

    public function setId_saida_avulsa($id_saida_avulsa)
    {
        $this->id_saida_avulsa = $id_saida_avulsa;
    }

    public function getId_ordem_producao()
    {
        return $this->id_ordem_producao;
    }

    public function setId_ordem_producao($id_ordem_producao)
    {
        $this->id_ordem_producao = $id_ordem_producao;
    }

    public function getId_transferencia()
    {
        return $this->id_transferencia;
    }

    public function setId_transferencia($id_transferencia)
    {
        $this->id_transferencia = $id_transferencia;
    }

    public function getEntrada_saida()
    {
        return $this->entrada_saida;
    }

    public function setEntrada_saida($entrada_saida)
    {
        $this->entrada_saida = $entrada_saida;
    }

    public function getData_movimento()
    {
        return $this->data_movimento;
    }

    public function setData_movimento($data_movimento)
    {
        $this->data_movimento = $data_movimento;
    }

    public function getQtde_movimento()
    {
        return $this->qtde_movimento;
    }

    public function setQtde_movimento($qtde_movimento)
    {
        $this->qtde_movimento = $qtde_movimento;
    }

    public function getValor_movimento()
    {
        return $this->valor_movimento;
    }

    public function setValor_movimento($valor_movimento)
    {
        $this->valor_movimento = $valor_movimento;
    }

    public function getSubtotal_movimento()
    {
        return $this->subtotal_movimento;
    }

    public function setSubtotal_movimento($subtotal_movimento)
    {
        $this->subtotal_movimento = $subtotal_movimento;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getSaldoestoque()
    {
        return $this->saldoestoque;
    }

    public function setSaldoestoque($saldoestoque)
    {
        $this->saldoestoque = $saldoestoque;
    }

    public function toArray()
    {
        $array = array();
        foreach ($this as $key => $value) {
            if (property_exists($this, $key)) {
                $array[$key] = $value;
            }
        }
        return $array;
    }

    public function toStd()
    {
        $std = new \stdClass();
        foreach ($this as $key => $value) {
            if (property_exists($this, $key)) {
                if (is_object($value)) {
                    $std->{$key} = $value->getStdClass();
                } else {
                    $std->{$key} = $value;
                }
            }
        }
        return $std;
    }
}
