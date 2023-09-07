<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\SaidaEstoqueService;

class SaidaestoqueController extends Controller
{
    private $tabela = "tb_saida_estoque";
    private $campo  = "id_saida";

    public function index()
    {
        $dados["lista"] = SaidaEstoqueService::listaPorData(hoje());
        $dados["view"]  = "SaidaEstoque/Create";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["tb_saida_estoque"] = Flash::getForm();
        $dados["view"] = "SaidaEstoque/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $tb_saida_estoque = Service::get($this->tabela, $this->campo, $id);
        if (!$tb_saida_estoque) {
            $this->redirect(URL_BASE . "saidaestoque");
        }

        $dados["tb_saida_estoque"]   = $tb_saida_estoque;
        $dados["view"]      = "SaidaEstoque/Create";
        $this->load("template", $dados);
    }

    public function inserir()
    {
        $tb_saida_estoque = new \stdClass();
        $tb_saida_estoque->id_produto         = $_POST['id_produto'];
        $tb_saida_estoque->id_local_estoque   = $_POST['id_local_estoque'];
        $tb_saida_estoque->qtde_saida       = $_POST['qtde'];
        $tb_saida_estoque->valor_saida      = $_POST['preco'];
        $tb_saida_estoque->subtotal_saida   = floatval($tb_saida_estoque->qtde_saida) * floatval($tb_saida_estoque->valor_saida);
        $tb_saida_estoque->data_saida       = hoje();
        $tb_saida_estoque->hora_saida       = agora();

        if (SaidaEstoqueService::salvar($tb_saida_estoque, $this->campo, $this->tabela)) {
            $resultado = 0;
            $msg = Flash::getMsg();
        } else {
            $resultado = 1;
            $msg = Flash::getErro();
        }
        $lista = SaidaEstoqueService::listaPorData(hoje());
        echo json_encode([
            "resultado" => $resultado,
            "msg" => $msg,
            "lista" => $lista
        ]);
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "saidaestoque");
    }
}
