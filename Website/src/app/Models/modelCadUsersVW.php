<?php

namespace App\Models;

use CodeIgniter\Model;

class modelCadUsersVW extends Model
{
    protected $table = 'vwcadUsers';
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
        'DataDesc',
        'Sexo',
        'SexoDesc',
        'EstadoCivil',
        'EstadoCivildesc',
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
        'TotalConvite',
        'TotalConvidado'
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

   
}
