<?php

namespace App\Models;

use CodeIgniter\Model;

class modelLnkConviteConvidado extends Model
{
    protected $table = 'lnkConviteConvidado';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'ConviteCod',
        'UserEmail',
        'Nome',
        'Posicao',
        'Confirmado',
        'Parentesco',
        'Detalhes',
        'Convidado',
        'DataConvite',
        'DataConfirmado'
    ];
    protected $returnType = 'object';

    public function ConfConvite($id, $data)
	{
        $id = (array) $id;
        $data = (array) $data;
        $builder = $this->db->table('lnkConviteConvidado');
        $Result = $builder->update($data, $id);

		return $Result;
	}
}
