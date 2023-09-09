<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\UnidadeService;

class UnidadeController extends Controller
{
    private $tabela = "tb_unidade_medida";
    private $campo  = "id_unidade";

    public function index()
    {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]  = "Unidade/Index";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["tb_unidade_medida"] = Flash::getForm();
        $dados["view"]              = "Unidade/Create";
        $this->load("template", $dados);
    }

    public function edit($IdUnidadeMedida)
    {
        $CampoData = Service::get($this->tabela, $this->campo, $IdUnidadeMedida);
        if (!$CampoData) {
            $this->redirect(URL_BASE . "unidade");
        }

        $dados["CampoData"] = $CampoData;
        $dados["view"]              = "Unidade/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $CampoData = new \stdClass();
        $CampoData->id_unidade = $_POST["id_unidade"];
        $CampoData->unidade    = $_POST['unidade'];

        Flash::setForm($CampoData);
        if (UnidadeService::salvar($CampoData, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "unidade");
        } else {
            if (!$CampoData->id_unidade) {
                $this->redirect(URL_BASE . "unidade/create");
            } else {
                $this->redirect(URL_BASE . "unidade/edit/" . $CampoData->id_unidade);
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "unidade");
    }
}
