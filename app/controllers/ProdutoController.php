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

    public function edit($IdProduto)
    {
        $DadosProduto = Service::get($this->tabela, $this->campo, $IdProduto);
        if (!$DadosProduto) {
            $this->redirect(URL_BASE . "produto");
        }
        $dados["categorias"]   = Service::lista("tb_categoria");
        $dados["unidades"]     = Service::lista("tb_unidade_medida");
        $dados["DadosProduto"] = $DadosProduto;
        $dados["view"]         = "Produto/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $DadosProduto = new \stdClass();
        $DadosProduto->id_produto     = $_POST["id_produto"];
        $DadosProduto->desc_produto   = $_POST['desc_produto'];
        $DadosProduto->id_categoria   = $_POST['id_categoria'];
        $DadosProduto->id_unidade     = $_POST['id_unidade'];
        $DadosProduto->vr_venda       = $_POST['vr_venda'];
        $DadosProduto->eh_produto     = $_POST['eh_produto'];
        $DadosProduto->eh_insumo      = $_POST['eh_insumo'];
        $DadosProduto->eh_promocao    = $_POST['eh_promocao'];
        $DadosProduto->eh_maisvendido = $_POST['eh_maisvendido'];
        $DadosProduto->eh_lancamento  = $_POST['eh_lancamento'];

        Flash::setForm($DadosProduto);
        if (ProdutoService::salvar($DadosProduto, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "produto");
        } else {
            if (!$DadosProduto->id_produto) {
                $this->redirect(URL_BASE . "produto/create");
            } else {
                $this->redirect(URL_BASE . "produto/edit/" . $DadosProduto->id_produto);
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
