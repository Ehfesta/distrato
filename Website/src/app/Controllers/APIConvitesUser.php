<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelCadConviteVW;

 
class APIConvitesUser extends ResourceController
{
    use ResponseTrait;
    // lista todos livros
    // public function index()
    // {
    //     $model = new ModelCadConviteVW();
    //     $data = $model->findAll();
    //     return $this->respond($data);
    // }
 
    // lista um livro
    public function show($cod = null)
    {
        $request = service('request'); 
        if ($request->getServer('HTTP_AUTHORIZATION') == mob_token) {
            $model = new ModelCadConviteVW();
            $data = $model->getWhere(['cadUserID' => $cod, 'TipoConviteID' => '1'])->getResult();

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