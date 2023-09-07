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

    public function edit($id)
    {
        $tb_unidade_medida = Service::get($this->tabela, $this->campo, $id);
        if (!$tb_unidade_medida) {
            $this->redirect(URL_BASE . "unidade");
        }

        $dados["tb_unidade_medida"] = $tb_unidade_medida;
        $dados["view"]              = "Unidade/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $tb_unidade_medida = new \stdClass();
        $tb_unidade_medida->id_unidade = $_POST["id_unidade"];
        $tb_unidade_medida->unidade    = $_POST['unidade'];

        Flash::setForm($tb_unidade_medida);
        if (UnidadeService::salvar($tb_unidade_medida, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "unidade");
        } else {
            if (!$tb_unidade_medida->id_unidade) {
                $this->redirect(URL_BASE . "unidade/create");
            } else {
                $this->redirect(URL_BASE . "unidade/edit/" . $tb_unidade_medida->id_unidade);
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "unidade");
    }
}
