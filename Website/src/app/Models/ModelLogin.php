<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
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
        'Alterado'
    ];
}
