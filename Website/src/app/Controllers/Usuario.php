<?php

namespace App\Controllers;


use App\Models\ModelCadUsers;


class Convites extends BaseController
{
    public function __construct()
    {
        $this->cadUsers = new ModelCadUsers();
    }

    public function index()
    {
        echo view('fragments/header');
        echo view('usuario/index');
        echo view('fragments/footer');
    }

   
}
