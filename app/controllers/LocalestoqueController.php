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
    
    public function edit($id){
        $tb_local_estoque = Service::get($this->tabela, $this->campo, $id);       
        if(!$tb_local_estoque){
            $this->redirect(URL_BASE."localestoque");
        }
        
        $dados["lista"] = Service::lista($this->tabela); 
        $dados["tb_local_estoque"]   = $tb_local_estoque;
        $dados["view"]      = "LocalEstoque/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $tb_local_estoque = new \stdClass();
        $tb_local_estoque->id_local_estoque        = $_POST["id_local_estoque"];
        $tb_local_estoque->local_estoque 		    = $_POST['local_estoque'];
        $tb_local_estoque->deposito 		        = $_POST['deposito'];
        
        Flash::setForm($tb_local_estoque);
        if(LocalEstoqueService::salvar($tb_local_estoque, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."localestoque");
        }else{
            if(!$tb_local_estoque->id_local_estoque){
                $this->redirect(URL_BASE."localestoque/create");
            }else{
                $this->redirect(URL_BASE."localestoque/edit/".$tb_local_estoque->id_local_estoque);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."localestoque");
    }
}

