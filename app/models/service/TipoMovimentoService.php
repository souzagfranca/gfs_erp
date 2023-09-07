<?php
namespace app\models\service;

use app\models\validacao\TipoMovimentoValidacao;

class TipoMovimentoService{
    public static function salvar($tb_tipo_movimento, $campo, $tabela){
        $validacao = TipoMovimentoValidacao::salvar($tb_tipo_movimento);
        return Service::salvar($tb_tipo_movimento, $campo, $validacao->listaErros(), $tabela);
    }
}

