<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelCadConviteVW;
use App\Models\modelLnkConviteConvidadoVW;

 
class APIConvitesConv extends ResourceController
{
    use ResponseTrait;
    // lista todos livros
    public function index()
    {
        $model = new ModelCadConviteVW();
        $data = $model->findAll();
        return $this->respond($data);
    }
 
    // lista um livro
    public function show($id = null)
    {
        $request = service('request'); 
        if ($request->getServer('HTTP_AUTHORIZATION') == mob_token) {

        $model = new modelLnkConviteConvidadoVW();
        $data = $model->orderBy('conv_DataEvento DESC')->getWhere(['UserEmail' => $id, 'conv_Status >=' => '3', 'TipoConviteID' => '1'])->getResult();
        

         if ($data) {
                $data = [
                    'status' => '200',
                    'data'   => $data,
                ];
                return $this->respond($data, 200);
            }

            return $this->failNotFound('Nenhum dado encontrado');
        }
        return $this->failUnauthorized('O cliente não está autorizado');     
    }
}