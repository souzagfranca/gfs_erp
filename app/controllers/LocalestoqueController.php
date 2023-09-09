<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\LocalEstoqueService;

class LocalestoqueController extends Controller{
   private $tabela = "tb_local_estoque";
   private $campo  = "id_local_estoque";
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "LocalEstoque/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["tb_local_estoque"] = Flash::getForm();
        $dados["view"] = "LocalEstoque/Create";
        $this->load("template", $dados);
    }
    
    public function edit($IdLocalEstoque){
        $DadosLocalEstoque = Service::get($this->tabela, $this->campo, $IdLocalEstoque);       
        if(!$DadosLocalEstoque){
            $this->redirect(URL_BASE."localestoque");
        }
        
        $dados["lista"]             = Service::lista($this->tabela); 
        $dados["DadosLocalEstoque"] = $DadosLocalEstoque;
        $dados["view"]              = "LocalEstoque/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $DadosLocalEstoque = new \stdClass();
        $DadosLocalEstoque->id_local_estoque        = $_POST["id_local_estoque"];
        $DadosLocalEstoque->local_estoque 		    = $_POST['local_estoque'];
        $DadosLocalEstoque->deposito 		        = $_POST['deposito'];
        
        Flash::setForm($DadosLocalEstoque);
        if(LocalEstoqueService::salvar($DadosLocalEstoque, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."localestoque");
        }else{
            if(!$DadosLocalEstoque->id_local_estoque){
                $this->redirect(URL_BASE."localestoque/create");
            }else{
                $this->redirect(URL_BASE."localestoque/edit/".$DadosLocalEstoque->id_local_estoque);
            }
        }
    }
    
    public function excluir($IdLocalEstoque){
        Service::excluir($this->tabela, $this->campo, $IdLocalEstoque);
        $this->redirect(URL_BASE."localestoque");
    }
}

