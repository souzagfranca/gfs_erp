<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\EntradaEstoqueService;

class EntradaestoqueController extends Controller
{
    private $tabela = "tb_entrada_estoque";
    private $campo  = "id_entrada";

    public function index()
    {
        $dados["lista"] = EntradaEstoqueService::listaPorData(hoje());
        $dados["view"]  = "EntradaEstoque/Create";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["tb_entrada_estoque"] = Flash::getForm();
        $dados["view"] = "EntradaEstoque/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $tb_entrada_estoque = Service::get($this->tabela, $this->campo, $id);
        if (!$tb_entrada_estoque) {
            $this->redirect(URL_BASE . "entradaestoque");
        }

        $dados["tb_entrada_estoque"]   = $tb_entrada_estoque;
        $dados["view"]      = "EntradaEstoque/Create";
        $this->load("template", $dados);
    }

    public function inserir()
    {
        $tb_entrada_estoque = new \stdClass();
        $tb_entrada_estoque->id_produto         = $_POST['id_produto'];
        $tb_entrada_estoque->id_local_estoque   = $_POST['id_local_estoque'];
        $tb_entrada_estoque->qtde_entrada       = $_POST['qtde'];
        $tb_entrada_estoque->valor_entrada      = $_POST['preco'];
        $tb_entrada_estoque->subtotal_entrada   = floatval($tb_entrada_estoque->qtde_entrada) * floatval($tb_entrada_estoque->valor_entrada);
        $tb_entrada_estoque->data_entrada       = hoje();
        $tb_entrada_estoque->hora_entrada       = agora();

        if (EntradaEstoqueService::salvar($tb_entrada_estoque, $this->campo, $this->tabela)) {
            $resultado = 0;
            $msg = Flash::getMsg();
        } else {
            $resultado = 1;
            $msg = Flash::getErro();
        }
        $lista = EntradaEstoqueService::listaPorData(hoje());
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
