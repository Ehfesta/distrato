<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSysTextoEmail extends Model
{
    protected $table = 'sysTextoEmail';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Descricao', 
        'Titulo', 
        'Corpo'
    ];
}
