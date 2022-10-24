<?php

namespace App\Controllers;

class Hash extends BaseController
{
    //GERA HASH SENHA
    public function set($senha)
    {
        $hash = hash('sha256',$senha)."AzY".base64_encode($senha);
        return $hash;
    }

}