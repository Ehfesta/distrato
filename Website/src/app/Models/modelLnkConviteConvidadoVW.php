<?php

namespace App\Models;

use CodeIgniter\Model;

class modelLnkConviteConvidadoVW extends Model
{
    protected $table = 'vwlnkConviteConvidado';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'UserEmail', 
        'Nome', 
        'Posicao', 
        'Confirmado', 
        'ConfirmadoDesc', 
        'DataConvite', 
        'DataConfirmado', 
        'conv_ID', 
        'conv_Cod', 
        'conv_cadUserID', 
        'conv_Titulo', 
        'conv_Status', 
        'conv_StatusDesc', 
        'conv_StatusCor', 
        'conv_Descricao', 
        'conv_DataEvento', 
        'conv_DataEventoDesc', 
        'conv_HoraInicio', 
        'conv_HoraFim', 
        'conv_TipoEventoID', 
        'conv_TipoEventoDesc', 
        'conv_TipoPublicoID', 
        'conv_TipoPublicoDesc', 
        'conv_PresenteVirtual', 
        'conv_PresenteVirtualDesc', 
        'conv_Convidar', 
        'conv_ConvidarDesc', 
        'conv_Compartilhar', 
        'conv_CompartilharDesc', 
        'conv_ListaConvidados', 
        'conv_ListaConvidadosDesc', 
        'conv_MuralRecado', 
        'conv_MuralRecadoDesc', 
        'conv_Endereco', 
        'conv_Obs', 
        'conv_DataCriacao', 
        'conv_DataCriacaoDesc', 
        'conv_DataUpdate', 
        'conv_DataUpdateDesc',
        'StatusHex',
        'conv_Img',
    ];
    protected $returnType = 'object';

}
