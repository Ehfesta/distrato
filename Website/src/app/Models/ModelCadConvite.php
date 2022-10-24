<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCadConvite extends Model
{
    protected $table = 'cadConvite';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Cod',
        'cadUserID',
        'Titulo',
        'Status',
        'Descricao',
        'DataEvento',
        'HoraInicio',
        'HoraFim',
        'TipoEventoID',
        'TipoPublicoID',
        'PresenteVirtual',
        'Convidar',
        'Compartilhar',
        'ListaConvidados',
        'MuralRecado',
        'Endereco',
        'Obs',
        'Img',
        'ImgOri',
        'DataCriacao',
        'DataUpdate'
    ];
    protected $validationRules    = [
        'Cod'               => 'required|max_length[90]',
        'cadUserID'         => 'required|max_length[11]'
    ];

    public function updConvite($cod, $data)
	{
        $data = (array) $data;
        //var_dump($data);
		$builder = $this->db->table('cadConvite');
		$builder->where('Cod', $cod);
		$builder->update($data);

		return true;
	}

    public function addConvite($data)
	{
        //var_dump($data);
		$builder = $this->db->table('cadConvite');
		$builder->insert($data);

		return $this->db->insertID();
	}
    public function updCodConvite($ID, $data)
	{
		$builder = $this->db->table('cadConvite');
		$builder->where('ID', $ID);
		$builder->update($data);

		return true;
	}
}