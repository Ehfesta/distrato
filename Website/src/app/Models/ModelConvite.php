<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelConvite extends Model
{
    protected $table = 'cadConvite';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Cod', 
        'cadUser_ID', 
        'Titulo', 
        'DataEvento', 
        'HoraInicio', 
        'HoraFim', 
        'Descricao', 
        'Status',
        'Img'
    ];
    protected $returnType = 'object';

}
