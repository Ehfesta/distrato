<?php

namespace App\Models;

use CodeIgniter\Model;

class modelCadUsers extends Model
{
    protected $table = 'cadUsers';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Cod',
        'Email',
        'Nome',
        'Senha',
        'Token',
        'Criado',
        'Alterado',
        'Data',
        'Sexo',
        'EstadoCivil',
        'Localizacao',
        'TagMusica',
        'TagEvento',
        'TagComida',
        'TagBebida',
        'lnkFacebook',
        'lnkInstagram',
        'lnkTwitter',
        'lnkGoogle',
        'lnkLinkedin',
        'imgpessoa'
    ];

    public function UserByLogin($Login): array
    {
        $rq =  $this->where('Email', $Login)->first();

        return !is_null($rq) ? $rq : [];
    }
    
    public function UserByID($ID): array
    {
        $rq =  $this->where('ID', $ID)->first();

        return !is_null($rq) ? $rq : [];
    }

    public function updPerfil($cod, $data)
	{
        $data = (array) $data;
        //var_dump($data);
		$builder = $this->db->table('cadUsers');
		$builder->where('Cod', $cod);
		$builder->update($data);

		return true;
	}
    
}
