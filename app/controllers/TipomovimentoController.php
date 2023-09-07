<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\TipoMovimentoService;

class TipomovimentoController extends Controller{
   private $tabela = "tb_tipo_movimento";
   private $campo  = "id_tipo_movimento";
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Tipo_Movimento/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["tb_tipo_movimento"] = Flash::getForm();
        $dados["view"] = "Tipo_Movimento/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $tb_tipo_movimento = Service::get($this->tabela, $this->campo, $id);       
        if(!$tb_tipo_movimento){
            $this->redirect(URL_BASE."tipomovimento");
        }
        
        $dados["tb_tipo_movimento"]   = $tb_tipo_movimento;
        $dados["view"]      = "Tipo_Movimento/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $tb_tipo_movimento = new \stdClass();
        $tb_tipo_movimento->id_tipo_movimento          = $_POST["id_tipo_movimento"];
        $tb_tipo_movimento->tipo_movimento 		    = $_POST['tipo_movimento'];
        $tb_tipo_movimento->ent_sai 		            = $_POST['ent_sai'];
        $tb_tipo_movimento->movimenta_estoque 		    = $_POST['movimenta_estoque'];
        
        Flash::setForm($tb_tipo_movimento);
        if(TipoMovimentoService::salvar($tb_tipo_movimento, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."tipomovimento");
        }else{
            if(!$tb_tipo_movimento->id_tipo_movimento){
                $this->redirect(URL_BASE."tipomovimento/create");
            }else{
                $this->redirect(URL_BASE."tipomovimento/edit/".$tb_tipo_movimento->id_tipo_movimento);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."tipomovimento");
    }
}

