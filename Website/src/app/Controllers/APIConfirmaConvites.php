<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\modelLnkConviteConvidado;


class APIConfirmaConvites extends ResourceController
{
    use ResponseTrait;

    public function Confirma()
    {
        $this->ConviteConvidado = new modelLnkConviteConvidado();

        $request = service('request');
        $bodyAPI = $this->request->getJSON();

        if ($request->getServer('HTTP_AUTHORIZATION') == mob_token) {

            $return = 0;
            $DataConfirmado = date("Y-m-d H:i:s");

            $ConviteCod = $bodyAPI->codConvite;
            $Confirmado = $bodyAPI->resp;
            $UserEmail = $bodyAPI->UserEmail;

            $id = [
                "ConviteCod" => $ConviteCod,
                "UserEmail" => $UserEmail
            ];

            $dados = [
                "Confirmado" => $Confirmado,
                "DataConfirmado" => $DataConfirmado
            ];

            $data = $this->ConviteConvidado->ConfConvite($id, $dados);

            if ($data == true) {
                $data = [
                    'status' => '200',
                    'data'   => "Resposta registrada",
                ];
                return $this->respond($data, 200);
            }
            return $this->fail('Erro ao registrar confirmação', 400);
        }
        return $this->failUnauthorized('O cliente não está autorizado');
    }
}
