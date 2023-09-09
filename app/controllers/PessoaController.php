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

    public function edit($IdPessoa)
    {
        $DadosPessoa = Service::get($this->tabela, $this->campo, $IdPessoa);
        if (!$DadosPessoa) {
            $this->redirect(URL_BASE . "pessoa");
        }

        $dados["DadosPessoa"] = $DadosPessoa;
        $dados["view"]      = "Pessoa/Create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $DadosPessoa = new \stdClass();
        $DadosPessoa->id_pessoa        = $_POST["id_pessoa"];
        $DadosPessoa->eh_cliente       = $_POST['eh_cliente'];
        $DadosPessoa->eh_fornecedor    = $_POST['eh_fornecedor'];
        $DadosPessoa->eh_transportador = $_POST['eh_transportador'];
        $DadosPessoa->razao_social     = $_POST['razao_social'];
        $DadosPessoa->nome_fantasia    = $_POST['nome_fantasia'];
        $DadosPessoa->cpf              = ($_POST['cpf']) ? tira_mascara($_POST['cpf']) : null;
        $DadosPessoa->cnpj             = $_POST['cnpj'];
        $DadosPessoa->data_cadastro    = $_POST['data_cadastro'];
        $DadosPessoa->ativo            = $_POST['ativo'];
        $DadosPessoa->fone             = ($_POST['fone']) ? tira_mascara($_POST['fone']) : null;
        $DadosPessoa->celular          = ($_POST['celular']) ? tira_mascara($_POST['celular']) : null;
        $DadosPessoa->email            = $_POST['email'];
        $DadosPessoa->senha            = $_POST['senha'];
        $DadosPessoa->cep              = $_POST['cep'];
        $DadosPessoa->logradouro       = $_POST['logradouro'];
        $DadosPessoa->numero           = $_POST['numero'];
        $DadosPessoa->uf               = $_POST['uf'];
        $DadosPessoa->cidade           = $_POST['cidade'];
        $DadosPessoa->complemento      = $_POST['complemento'];
        $DadosPessoa->bairro           = $_POST['bairro'];
        $DadosPessoa->ie               = $_POST['ie'];
        $DadosPessoa->rg               = $_POST['rg'];
        
        Flash::setForm($DadosPessoa);
        if (PessoaService::salvar($DadosPessoa, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "pessoa");
        } else {
            if (!$DadosPessoa->id_pessoa) {
                $this->redirect(URL_BASE . "pessoa/create");
            } else {
                $this->redirect(URL_BASE . "pessoa/edit/" . $DadosPessoa->id_pessoa);
            }
        }
    }

    public function excluir($IdPessoa)
    {
        Service::excluir($this->tabela, $this->campo, $IdPessoa);
        $this->redirect(URL_BASE . "pessoa");
    }
}
