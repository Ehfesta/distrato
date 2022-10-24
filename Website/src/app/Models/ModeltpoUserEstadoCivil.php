<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeltpoUserEstadoCivil extends Model
{
    protected $table = 'tpoUserEstadoCivil';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Descricao', 
        'Ativo'
    ];

    protected $returnType = 'object';

   
}