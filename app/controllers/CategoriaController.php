<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\CategoriaService;

class CategoriaController extends Controller
{
    private $tabela = "tb_categoria";
    private $campo  = "id_categoria";

    public function index()
    {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]  = "Categoria/Index";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["tb_categoria"] = Flash::getForm();
        $dados["view"]         = "Categoria/Create";
        $this->load("template", $dados);
    }

    public function edit($IdCategoria)
    {
        $CampoData = Service::get($this->tabela, $this->campo, $IdCategoria);
        if (!$CampoData) {
            $this->redirect(URL_BASE . "categoria");
        }

        $dados["CampoData"] = $CampoData;
        $dados["view"]      = "Categoria/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $CampoData = new \stdClass();
        $CampoData->id_categoria   = $_POST["id_categoria"];
        $CampoData->desc_categoria = $_POST['desc_categoria'];

        Flash::setForm($CampoData);
        if (CategoriaService::salvar($CampoData, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "categoria");
        } else {
            if (!$CampoData->id_categoria) {
                $this->redirect(URL_BASE . "categoria/create");
            } else {
                $this->redirect(URL_BASE . "categoria/edit/" . $CampoData->id_categoria);
            }
        }
    }

    public function excluir($IdCategoria)
    {
        Service::excluir($this->tabela, $this->campo, $IdCategoria);
        $this->redirect(URL_BASE . "categoria");
    }
}
