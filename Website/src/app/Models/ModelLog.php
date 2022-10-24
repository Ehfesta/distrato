<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;
use CodeIgniter\HTTP\Request;

class ModelLog extends Model
{
    protected $request;
    
    public function gravar($msg){

        $this->request = new Request(); 

        $data = date('Y-m-d');
        $ip = $this->request->getIPAddress();
        $browser = \Config\Services::request()->getUserAgent();

        $idUsuario = session()->get("id_usuario");
        $nomeUsuario = session()->get("nome_sobrenome");

        $arquivo = './writable/logs/l-'.$data.'.log';
        $con = fopen($arquivo, "a+", 0);
        $linha = $ip.';'.$browser.';'. $idUsuario.'-'.$nomeUsuario.';'.$msg.';\n';

        fwrite($con, $linha, strlen($linha));
        fclose($con);
    }
}
