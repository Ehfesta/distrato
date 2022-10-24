<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\modelLnkConviteConvidadoVW;


class APIConvidados extends ResourceController
{
    use ResponseTrait;

    public function show($id = null)
    {
        $this->ConviteConvidadoVW = new modelLnkConviteConvidadoVW();

        // $id = "1D43140A15";
        $request = service('request');
        if ($request->getServer('HTTP_AUTHORIZATION') == mob_token) {

            $sql = "SELECT vwlnkconviteconvidado.UserEmail, vwlnkconviteconvidado.Nome, vwlnkconviteconvidado.Detalhes, count(lnkConviteConvidado.ID)as convQtd FROM vwlnkconviteconvidado 
            Left Join lnkConviteConvidado on vwlnkconviteconvidado.UserEmail = lnkConviteConvidado.Convidado
            where vwlnkconviteconvidado.Convidado is null and vwlnkconviteconvidado.conv_Cod='$id'
            Group by vwlnkconviteconvidado.UserEmail, vwlnkconviteconvidado.Nome, vwlnkconviteconvidado.Detalhes, lnkConviteConvidado.Convidado";
            
            $data = $this->ConviteConvidadoVW->query($sql)->getResult();
            if ($data[0]->UserEmail) {
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
}
