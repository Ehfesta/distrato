<?php

namespace App\Models;

use CodeIgniter\Model;

class modelCadComentariosVW extends Model
{
    protected $table = 'vwcadComentarios';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'ConviteID',
        'Status',
        'UserCod',
        'UserNome',
        'UserEmail',
        'Comentario',
        'data',
        'dataDesc'
    ];
    
    protected $returnType = 'object';
    
}
