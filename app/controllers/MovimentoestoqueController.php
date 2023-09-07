<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\MovimentoService;
use app\models\service\Service;

class MovimentoestoqueController extends Controller
{
    private $tabela = "tb_movimento_estoque";
    private $campo  = "id_movimento";

    public function index()
    {
        $dados["lista"]    = MovimentoService::lista(100);
        $dados["produtos"] = Service::lista("tb_produto");
        $dados["view"]     = "MovimentoEstoque/Index";
        $this->load("template", $dados);
    }

    public function filtro()
    {
        $FiltroMovimentoEstoque = new \stdClass();
        $FiltroMovimentoEstoque->id_produto = $_GET["id_produto"];
        $FiltroMovimentoEstoque->data1      = $_GET["data1"];
        $FiltroMovimentoEstoque->data2      = $_GET["data2"];

        $dados["lista"]                     = MovimentoService::filtro($FiltroMovimentoEstoque);
        $dados["produto"]                   = Service::get("tb_produto", "id_produto", $FiltroMovimentoEstoque->id_produto);
        $dados["produtos"]                  = Service::lista("tb_produto");
        $dados["view"]                      = "MovimentoEstoque/Index";
        $this->load("template", $dados);
    }
}
