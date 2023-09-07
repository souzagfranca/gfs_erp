<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\PessoaService;

class PessoaController extends Controller
{
    private $tabela = "tb_pessoa";
    private $campo  = "id_pessoa";

    public function index()
    {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]  = "Pessoa/Index";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["tb_pessoa"] = Flash::getForm();
        $dados["view"]      = "Pessoa/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $tb_pessoa = Service::get($this->tabela, $this->campo, $id);
        if (!$tb_pessoa) {
            $this->redirect(URL_BASE . "pessoa");
        }

        $dados["tb_pessoa"] = $tb_pessoa;
        $dados["view"]      = "Pessoa/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $tb_pessoa = new \stdClass();
        $tb_pessoa->id_pessoa        = $_POST["id_pessoa"];
        $tb_pessoa->eh_cliente       = $_POST['eh_cliente'];
        $tb_pessoa->eh_fornecedor    = $_POST['eh_fornecedor'];
        $tb_pessoa->eh_transportador = $_POST['eh_transportador'];
        $tb_pessoa->nome             = $_POST['nome'];
        $tb_pessoa->nome_fantasia    = $_POST['nome_fantasia'];
        $tb_pessoa->cpf              = ($_POST['cpf']) ? tira_mascara($_POST['cpf']) : null;
        $tb_pessoa->cnpj             = $_POST['cnpj'];
        $tb_pessoa->data_cadastro    = $_POST['data_cadastro'];
        $tb_pessoa->ativo            = $_POST['ativo'];
        $tb_pessoa->fone             = ($_POST['fone']) ? tira_mascara($_POST['fone']) : null;
        $tb_pessoa->celular          = ($_POST['celular']) ? tira_mascara($_POST['celular']) : null;
        $tb_pessoa->email            = $_POST['email'];
        $tb_pessoa->senha            = $_POST['senha'];
        $tb_pessoa->cep              = $_POST['cep'];
        $tb_pessoa->logradouro       = $_POST['logradouro'];
        $tb_pessoa->numero           = $_POST['numero'];
        $tb_pessoa->uf               = $_POST['uf'];
        $tb_pessoa->cidade           = $_POST['cidade'];
        $tb_pessoa->complemento      = $_POST['complemento'];
        $tb_pessoa->bairro           = $_POST['bairro'];
        $tb_pessoa->ie               = $_POST['ie'];
        $tb_pessoa->rg               = $_POST['rg'];
        
        Flash::setForm($tb_pessoa);
        if (PessoaService::salvar($tb_pessoa, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "pessoa");
        } else {
            if (!$tb_pessoa->id_pessoa) {
                $this->redirect(URL_BASE . "pessoa/create");
            } else {
                $this->redirect(URL_BASE . "pessoa/edit/" . $tb_pessoa->id_pessoa);
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE . "pessoa");
    }
}
