<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogLogin extends Model
{
    protected $table = 'logLogin';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Status',
        'Email',
        'Senha',
        'IP',
        'country_code',
        'district',
        'isp',
        'data'
    ];
}
