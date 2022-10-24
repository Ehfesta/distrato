<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCadConviteVW extends Model
{
    protected $table = 'vwcadConvite';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Cod',
        'cadUserID',
        'Titulo',
        'Status',
        'StatusDesc',
        'Descricao',
        'DataEvento',
        'DataEventoDec',
        'HoraInicio',
        'HoraFim',
        'TipoEventoID',
        'TipoEventoDesc',
        'TipoPublicoID',
        'TipoPublicoDesc',
        'PresenteVirtual',
        'PresenteVirtualDesc',
        'Convidar',
        'ConvidarDesc',
        'Compartilhar',
        'CompartilharDesc',
        'ListaConvidados',
        'ListaConvidadosDesc',
        'MuralRecado',
        'MuralRecadoDesc',
        'Endereco',
        'Obs',
        'DataCriacao',
        'DataCriacaoDec',
        'DataUpdate',
        'DataUpdateDesc'
    ];
}