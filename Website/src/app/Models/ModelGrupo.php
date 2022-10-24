<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGrupo extends Model
{
	protected $table                = 'lnk_usuario_grupo';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = [
        'cad_grupo_id',
        'cad_usuario_id'
    ];
}
