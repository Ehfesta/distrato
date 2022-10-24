<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
	public function logout()
	{
		$items = ['Cod', 'Email', 'Nome'];
		session()->remove($items);

		return "logout";
	}
}
