<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ProdutoService;

class ProdutoController extends Controller
{
    private $tabela = "tb_produto";
    private $campo  = "id_produto";

    public function index()
    {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]  = "Produto/Index";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["tb_produto"] = Flash::getForm();
        $dados["categorias"] = Service::lista("tb_categoria");
        $dados["unidades"]   = Service::lista("tb_unidade_medida");
        $dados["view"]       = "Produto/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $tb_produto = Service::get($this->tabela, $this->campo, $id);
        if (!$tb_produto) {
            $this->redirect(URL_BASE . "produto");
        }
        $dados["categorias"] = Service::lista("tb_categoria");
        $dados["unidades"]   = Service::lista("tb_unidade_medida");
        $dados["tb_produto"] = $tb_produto;
        $dados["view"]       = "Produto/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $tb_produto = new \stdClass();
        $tb_produto->id_produto     = $_POST["id_produto"];
        $tb_produto->desc_produto   = $_POST['desc_produto'];
        $tb_produto->id_categoria   = $_POST['id_categoria'];
        $tb_produto->id_unidade     = $_POST['id_unidade'];
        $tb_produto->vr_venda       = $_POST['vr_venda'];
        $tb_produto->eh_produto     = $_POST['eh_produto'];
        $tb_produto->eh_insumo      = $_POST['eh_insumo'];
        $tb_produto->eh_promocao    = $_POST['eh_promocao'];
        $tb_produto->eh_maisvendido = $_POST['eh_maisvendido'];
        $tb_produto->eh_lancamento  = $_POST['eh_lancamento'];

        Flash::setForm($tb_produto);
        if (ProdutoService::salvar($tb_produto, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "produto");
        } else {
            if (!$tb_produto->id_produto) {
                $this->redirect(URL_BASE . "produto/create");
            } else {
                $this->redirect(URL_BASE . "produto/edit/" . $tb_produto->id_produto);
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "produto");
    }

    public function buscar($ValorCampo)
    {
        $produtos = Service::getLike($this->tabela, "desc_produto", $ValorCampo, true);
        echo json_encode($produtos);
    }
}
