<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeltpoPublico extends Model
{
    protected $table = 'tpoPublico';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Descricao', 
        'Ativo'
    ];

    protected $returnType = 'object';

   
}