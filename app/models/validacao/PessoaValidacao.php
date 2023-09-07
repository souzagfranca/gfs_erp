<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class PessoaValidacao
{
    public static function salvar($tb_pessoa)
    {
        $validacao = new Validacao();

        $validacao->setData("nome", $tb_pessoa->nome);
        $validacao->setData("eh_cliente", $tb_pessoa->eh_cliente);
        $validacao->setData("celular", $tb_pessoa->celular);
        $validacao->setData("email", $tb_pessoa->email);
        $validacao->setData("senha", $tb_pessoa->senha);
        $validacao->setData("cep", $tb_pessoa->cep);
        $validacao->setData("logradouro", $tb_pessoa->logradouro);
        $validacao->setData("numero", $tb_pessoa->numero);
        $validacao->setData("uf", $tb_pessoa->uf);
        $validacao->setData("cidade", $tb_pessoa->cidade);
        $validacao->setData("bairro", $tb_pessoa->bairro);
        $validacao->setData("cpf", $tb_pessoa->cpf);
        $validacao->setData("cnpj", $tb_pessoa->cnpj);

        //fazendo a validação
        $validacao->getData("nome")->isVazio()->isMinimo(5);
        $validacao->getData("celular")->isVazio();
        $validacao->getData("email")->isVazio()->isEmail();
        $validacao->getData("senha")->isVazio();
        $validacao->getData("cep")->isVazio();
        $validacao->getData("logradouro")->isVazio();
        $validacao->getData("numero")->isVazio();
        $validacao->getData("uf")->isVazio();
        $validacao->getData("cidade")->isVazio();
        $validacao->getData("bairro")->isVazio();

        if (!$tb_pessoa->eh_cliente && !$tb_pessoa->eh_fornecedor && !$tb_pessoa->eh_transportador) {
            $validacao->getData("eh_cliente")->isVazio("Favor definir o tipo de cadastro: cliente, fornecedor ou transportador.");
        }

        if ($tb_pessoa->cpf) {
            $validacao->getData("cpf")->isCPF();
        }

        if ($tb_pessoa->cnpj) {
            $validacao->getData("cnpj")->isCNPJ();
        }

        if ($tb_pessoa->email) {
            $tem = Service::get("tb_pessoa", "email", $tb_pessoa->email);
            if ($tem && $tem->id_pessoa != $tb_pessoa->id_pessoa) {
                $validacao->getData("email")->isUnico(1);
            }
        }

        return $validacao;
    }
}
