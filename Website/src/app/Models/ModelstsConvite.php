<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelstsConvite extends Model
{
    protected $table = 'stsConvite';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Descricao', 
        'Cor'
    ];

    protected $returnType = 'object';

   
}