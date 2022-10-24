<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\API\ResponseTrait;
use App\Models\modelCadUsers;


class APILogin extends ResourceController
{

    use ResponseTrait;
    // lista todos livros
    // public function index()
    // {
    //     $model = new modelCadUsers();
    //     $data = $model->findAll();
    //     return $this->respond($data);
    // }

    // lista um livro
    public function show($id = null)
    {
        $request = service('request'); 
        $data = $request->getServer('HTTP_AUTHORIZATION') .'=='. mob_token;
        $data = [
            'status' => '200',
            'data'   => $data,
        ];
        return $this->respond($data, 200);

        
        if ($request->getServer('HTTP_AUTHORIZATION') == mob_token) {
            $model = new modelCadUsers();
            $data = $model->getWhere(['Email' => $id])->getResult();

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
