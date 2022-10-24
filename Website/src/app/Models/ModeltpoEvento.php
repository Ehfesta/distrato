<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeltpoEvento extends Model
{
    protected $table = 'tpoEvento';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Descricao', 
        'Ativo'
    ];

    protected $returnType = 'object';

   
}