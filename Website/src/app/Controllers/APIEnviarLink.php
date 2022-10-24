<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelSysTextoEmail;

require('ServidorEmail.php');

class APIEnviarLink extends ResourceController
{
    use ResponseTrait;

    public function Compartilhar()
    {
        $this->sysTextoEmail = new ModelSysTextoEmail();
        $this->ServEmail = new ServidorEmail();

        $request = service('request');
        $bodyAPI = $this->request->getJSON();

        if ($request->getServer('HTTP_AUTHORIZATION') == mob_token) {

            $Email = $bodyAPI->dest;
            $Detalhe = $bodyAPI->coment;
            $Nome = $bodyAPI->userNome;
            $Link = base_url() . "TextoEmail/EnviarLink/";
            $CodConvite = $bodyAPI->codConvite;
            $URL = $Link . $CodConvite;
            $Texto = $this->sysTextoEmail->getWhere(['Descricao' => 'EnviarLink'])->getRow();

            if ($Texto) {
                $find = array("#!Nome!#", "#!Link!#", "#!Obs!#");
                $replace = array($Nome, $URL, $Detalhe);

                $Titulo = str_replace($find, $replace, $Texto->Titulo);
                $Corpo = str_replace($find, $replace, $Texto->Corpo);

                $sendEmail = $this->ServEmail->envioEmail($Email, $Titulo, $Corpo);

                if ($sendEmail == true) {
                    $retorno = "success";
                    $data = [
                        'status' => '200',
                        'data'   => $retorno,
                    ];
                    return $this->respond($data, 200);
                } else {
                    $data = [
                        'status' => '400',
                        'data'   => 'Erro ao enviar email',
                    ];
                    return $this->fail($data, 400);
                }
            } else {
                $data = [
                    'status' => '400',
                    'data'   => 'Erro ao enviar email',
                ];
                return $this->fail($data, 400);
            }
        }
        return $this->failUnauthorized('O cliente não está autorizado');
    }
}
