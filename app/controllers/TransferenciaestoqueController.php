<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\TransferenciaEstoqueService;

class TransferenciaestoqueController extends Controller
{
    private $tabela = "tb_transferencia_estoque";
    private $campo  = "id_entrada";

    public function index()
    {
        $dados["lista"] = TransferenciaEstoqueService::listaPorData(hoje());
        $dados["view"]  = "TransferenciaEstoque/Create";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["tb_transferencia_estoque"] = Flash::getForm();
        $dados["view"] = "TransferenciaEstoque/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $tb_transferencia_estoque = Service::get($this->tabela, $this->campo, $id);
        if (!$tb_transferencia_estoque) {
            $this->redirect(URL_BASE . "entradaestoque");
        }

        $dados["tb_transferencia_estoque"] = $tb_transferencia_estoque;
        $dados["view"]                     = "TransferenciaEstoque/Create";
        $this->load("template", $dados);
    }

    public function inserir()
    {
        $tb_transferencia_estoque = new \stdClass();
        $tb_transferencia_estoque->id_produto         = $_POST['id_produto'];
        $tb_transferencia_estoque->id_origem          = $_POST['id_origem'];
        $tb_transferencia_estoque->id_destino         = $_POST['id_destino'];
        $tb_transferencia_estoque->qtde_transferencia = $_POST['qtde'];
        $tb_transferencia_estoque->data_transferencia = hoje();

        if (TransferenciaEstoqueService::salvar($tb_transferencia_estoque, $this->campo, $this->tabela)) {
            $resultado = 0;
            $msg = Flash::getMsg();
        } else {
            $resultado = 1;
            $msg = Flash::getErro();
        }
        $lista = TransferenciaEstoqueService::listaPorData(hoje());
        echo json_encode([
            "resultado" => $resultado,
            "msg" => $msg,
            "lista" => $lista
        ]);
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "entradaestoque");
    }
}
