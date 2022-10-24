<?php

namespace App\Controllers;

use App\Models\modelCadUsers;

class LoginController extends BaseController
{
    public function index(){
        return view('login');
    }

    public function signin(){
        $login = $this->request->getPost('txtLogin');
        $pass = $this->request->getPost('txtPass');

		// return redirect()->to('/Dashboard');

		$modelUsuario = new modelCadUsers();

		$dadosUsuario = $modelUsuario->UserByLogin($login);
		var_dump($dadosUsuario);
		if (count($dadosUsuario) > 0) {
			$hashUsuario = $dadosUsuario['Senha'];
			if (password_verify($pass, $hashUsuario)) {
				session()->set('isLoggedIn', true);
				session()->set('login', $dadosUsuario['Login']);
				return redirect()->to('/Dashboard');
			} else {
				session()->setFlashData('msg', 'Usuário ou Senha inválidos');
				return redirect()->to('../');
			}
		} else {
			session()->setFlashData('msg', 'Usuário ou Senha inválidos');
			return redirect()->to('../');
		}
    }
}
