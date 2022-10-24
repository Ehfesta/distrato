<?php

namespace App\Models;

use CodeIgniter\Model;

class modelCadComentarios extends Model
{
    protected $table = 'cadComentarios';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'ConviteID',
        'Status',
        'UserCod',
        'Comentario',
        'data'
    ];
    
    protected $returnType = 'object';
    
}
