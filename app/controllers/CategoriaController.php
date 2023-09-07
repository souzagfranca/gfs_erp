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

    public function edit($id)
    {
        $tb_categoria = Service::get($this->tabela, $this->campo, $id);
        if (!$tb_categoria) {
            $this->redirect(URL_BASE . "categoria");
        }

        $dados["tb_categoria"] = $tb_categoria;
        $dados["view"]         = "Categoria/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $tb_categoria = new \stdClass();
        $tb_categoria->id_categoria = $_POST["id_categoria"];
        $tb_categoria->categoria    = $_POST['categoria'];

        Flash::setForm($tb_categoria);
        if (CategoriaService::salvar($tb_categoria, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "categoria");
        } else {
            if (!$tb_categoria->id_categoria) {
                $this->redirect(URL_BASE . "categoria/create");
            } else {
                $this->redirect(URL_BASE . "categoria/edit/" . $tb_categoria->id_categoria);
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "categoria");
    }
}
