<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class PessoaValidacao
{
    public static function salvar($DadosPessoa)
    {
        $validacao = new Validacao();

        $validacao->setData("razao_social", $DadosPessoa->razao_social);
        $validacao->setData("eh_cliente", $DadosPessoa->eh_cliente);
        $validacao->setData("celular", $DadosPessoa->celular);
        $validacao->setData("email", $DadosPessoa->email);
        $validacao->setData("senha", $DadosPessoa->senha);
        $validacao->setData("cep", $DadosPessoa->cep);
        $validacao->setData("logradouro", $DadosPessoa->logradouro);
        $validacao->setData("numero", $DadosPessoa->numero);
        $validacao->setData("uf", $DadosPessoa->uf);
        $validacao->setData("cidade", $DadosPessoa->cidade);
        $validacao->setData("bairro", $DadosPessoa->bairro);
        $validacao->setData("cpf", $DadosPessoa->cpf);
        $validacao->setData("cnpj", $DadosPessoa->cnpj);

        //fazendo a validação
        $validacao->getData("razao_social")->isVazio()->isMinimo(5);
        $validacao->getData("celular")->isVazio();
        $validacao->getData("email")->isVazio()->isEmail();
        $validacao->getData("senha")->isVazio();
        $validacao->getData("cep")->isVazio();
        $validacao->getData("logradouro")->isVazio();
        $validacao->getData("numero")->isVazio();
        $validacao->getData("uf")->isVazio();
        $validacao->getData("cidade")->isVazio();
        $validacao->getData("bairro")->isVazio();

        if (!$DadosPessoa->eh_cliente && !$DadosPessoa->eh_fornecedor && !$DadosPessoa->eh_transportador) {
            $validacao->getData("eh_cliente")->isVazio("Favor definir o tipo de cadastro: cliente, fornecedor ou transportador.");
        }

        if ($DadosPessoa->cpf) {
            $validacao->getData("cpf")->isCPF();
        }

        if ($DadosPessoa->cnpj) {
            $validacao->getData("cnpj")->isCNPJ();
        }

        if ($DadosPessoa->email) {
            $tem = Service::get("tb_pessoa", "email", $DadosPessoa->email);
            if ($tem && $tem->id_pessoa != $DadosPessoa->id_pessoa) {
                $validacao->getData("email")->isUnico(1);
            }
        }

        return $validacao;
    }
}
