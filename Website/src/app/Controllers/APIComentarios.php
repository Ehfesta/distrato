<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\modelCadComentariosVW;
use App\Models\modelCadComentarios;


class APIComentarios extends ResourceController
{
    use ResponseTrait;

    public function show($id = null)
    {
        $this->CadComentariosVW = new modelCadComentariosVW();
        $this->CadComentarios = new modelCadComentarios();

        //  $id = "1D43140A15";
        $request = service('request');
        if ($request->getServer('HTTP_AUTHORIZATION') == mob_token) {

            $ConviteCod = $this->request->getVar('Convite');
            $data = $this->CadComentariosVW->getWhere(['ConviteID' => $id])->getResult();
            if ($data) {
                $data = [
                    'status' => '200',
                    'data'   => $data,
                ];
                return $this->respond($data, 200);
            } else {
                $data = [
                    'status' => '402',
                    'data'   => 'Nenhum dado encontrado',
                ];
                return $this->respond($data, 400);
            }
        }
        return $this->failUnauthorized('O cliente não está autorizado');
    }


    public function SendComentario()
    {
        $this->CadComentarios = new modelCadComentarios();

        $request = service('request');
        $bodyAPI = $this->request->getJSON();

        if ($request->getServer('HTTP_AUTHORIZATION') == mob_token) {

            $DataConfirmado = date("Y-m-d H:i:s");

            $Status = '1';
            $UserCod = $bodyAPI->userCod;
            $Comentario = $bodyAPI->coment;
    
            $ConviteCod = $bodyAPI->codConvite;
    
            $dados = [
                "ConviteID" => $ConviteCod,
                "Status" => $Status,
                "UserCod" => $UserCod,
                "Comentario" => $Comentario,
                "data" => $DataConfirmado,
            ];

            $data = $this->CadComentarios->insert($dados);

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
