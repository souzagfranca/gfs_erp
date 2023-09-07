<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\LocalProdutoService;

class LocalprodutoController extends Controller
{
    private $tabela = "tb_local_produto";
    private $campo  = "id_local_produto";

    public function index()
    {
        $dados["lista"] = LocalProdutoService::lista();
        $dados["produtos"] = Service::lista("tb_produto");
        $dados["locais"] = Service::lista("tb_local_estoque");
        $dados["view"]  = "LocalProduto/Create";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["lista"] = LocalProdutoService::lista();
        $dados["tb_local_produto"] = Flash::getForm();
        $dados["produtos"] = Service::lista("tb_produto");
        $dados["locais"] = Service::lista("tb_local_estoque");
        $dados["view"] = "LocalProduto/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $tb_local_produto = Service::get($this->tabela, $this->campo, $id);
        if (!$tb_local_produto) {
            $this->redirect(URL_BASE . "localproduto");
        }

        $dados["lista"] = LocalProdutoService::lista();
        $dados["produtos"] = Service::lista("tb_produto");
        $dados["locais"] = Service::lista("tb_local_estoque");
        $dados["tb_local_produto"]   = $tb_local_produto;
        $dados["view"]      = "LocalProduto/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $tb_local_produto = new \stdClass();
        $tb_local_produto->id_local_produto          = $_POST["id_local_produto"];
        $tb_local_produto->id_produto                = $_POST['id_produto'];
        $tb_local_produto->id_local_estoque          = $_POST['id_local_estoque'];
        $tb_local_produto->estoque                   = 0;
        $em_massa                                 = $_POST['em_massa'];
        $tipo                                     = $_POST['tipo'];

        if ($em_massa == "S") {
            LocalProdutoService::salvarEmMassa($tb_local_produto->id_local_estoque, $tipo);
            $this->redirect(URL_BASE . "localproduto");
        } else {
            Flash::setForm($tb_local_produto);
            if (LocalProdutoService::salvar($tb_local_produto, $this->campo, $this->tabela)) {
                $this->redirect(URL_BASE . "localproduto");
            } else {
                if (!$tb_local_produto->id_local_produto) {
                    $this->redirect(URL_BASE . "localproduto/create");
                } else {
                    $this->redirect(URL_BASE . "localproduto/edit/" . $tb_local_produto->id_local_produto);
                }
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "localproduto");
    }

    public function listaPorProduto($id_produto) {
        $lista = LocalProdutoService::listaPorProduto($id_produto); 
        echo json_encode($lista);
    }
}
