<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if(session()->get('Nome') and session()->get('Nome')!=""){
            $data = array();
            $data['NomePessoa'] = session()->get('Nome');
    
            echo view('dashboard/index',$data);
        }else{
            unset(
                $_SESSION['Cod'],
                $_SESSION['Email'],
                $_SESSION['Nome']
            );

            header("Location: ".base_url()); 
            exit();
        }
    }
}
