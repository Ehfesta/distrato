<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeltpoUserSexo extends Model
{
    protected $table = 'tpoUserSexo';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Descricao', 
        'Ativo'
    ];

    protected $returnType = 'object';

   
}