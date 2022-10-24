<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Controllers\Hash;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

class ModelLogin extends Model
{   
    protected $hash;
    
    public function login2($dados)
    {
        $builder = $this->db->table('cad_colheita');
		$builder->where('Cod', $cod);
		$builder->update($data);

		return true;
    }
    public function login2($dados)
    {
        $this->hash = new Hash(); 

        $email = trim($dados['email']);
        $senha = trim($dados['password']);
        $valid = true;
        
        if ($email != "" and $senha != "" and $valid === true) {                   
            $query = $this->db->query("SELECT * FROM cad_usuario WHERE login = '$email'");
            $usuario = $query->getRowArray();
            $senhaDatabase = $usuario['senha'];
            $idusuario = $usuario['id'];

            //verificar usuário e senha
            if (isset($usuario)) {
                $result = $this->hash->valid($senha, $senhaDatabase); //verifica se a senha digitada é válida com password_hash

                if ($result == true) {

                    $dadosUsuario = $this->db->query("SELECT * FROM vw_usuario WHERE id = '$idusuario'")->getRowArray();
                    $idGrupo = $dadosUsuario['grupo'];

                    session()->set("id_usuario", $idusuario);
                    session()->set("nome", ucfirst($dadosUsuario['nome']));
                    session()->set("nome_sobrenome", ucfirst($dadosUsuario['nome']) . " " . ucfirst($dadosUsuario['sobrenome']));
                    session()->set("email", $dadosUsuario['email']);
                    session()->set("grupo", $idGrupo);
                    session()->set("system", $dadosUsuario['system']);
                    session()->set("id_empresa", $dadosUsuario['empresa_id']);

                    if($idGrupo == 1){
                        $grupo = 'gestor';
                    }else{
                        $grupo = 'cliente';
                    }

                    $usuarioLogado = [
                        'id_usuario' => $idusuario,
                        'nome' => ucfirst($dadosUsuario['nome']),
                        'nome_sobrenome' => ucfirst($dadosUsuario['nome']) . " " . ucfirst($dadosUsuario['sobrenome']),
                        'email' => $dadosUsuario['email'],
                        'grupo' => $grupo,
                    ];

                    $token = $this->geraJWT($usuarioLogado);

                    $info = [
                        'user' => $usuarioLogado['id_usuario'].'-'.$usuarioLogado['nome_sobrenome'],
                        'ip_address' => $dados['ip'],
                        'browser' => $dados['browser']
                    ];

                    log_message('info', 'Usuário '. $info["user"] .' logged into the system from '. $info["ip_address"] .' on browser '. $info["browser"]);

                    session()->set("token", $token);

                    if($idGrupo == 1){
                        return 'gestor';
                    }else{
                        return 'cliente';
                    }
                    
                } else {
                    return "senha";
                }
            }
        } else {
            return "campo";
        }
    }

    //VERIFICA SE JA EXISTE SESSÃO 
    public function verificaLogin()
    {
        $nome = session()->get("nome");
        $nome_sobrenome = session()->get("nome_sobrenome");
        $email = session()->get("email");
        $id_usuario = session()->get("id_usuario");

        // VERIFICA SE EXISTE DADOS NA SESSAO
        if ((isset($nome) || !empty($nome)) && (isset($nome_sobrenome) || !empty($nome_sobrenome)) && (isset($email) || !empty($email)) && (isset($id_usuario) || !empty($id_usuario)))
        {
            return true;

        } else {
            $items = ['nome','nome_sobrenome','email','id_usuario'];
            session()->remove($items);
            redirect()->to('/login');
        }
    }

    public function geraJWT($dados){
        $key = getenv('TOKEN_SECRET');

        $payload = array(
            "iat"   => 1356999524,
            "nbf"   => 1357000000,
            "uid"   => $dados['id_usuario'],
            "email" => $dados['email'],
            "grupo" => $dados['grupo']
        );

        return JWT::encode($payload, $key);
    }

    public function regeneraJWT()
    {

    }
}
