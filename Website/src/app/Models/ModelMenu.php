<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMenu extends Model
{
    protected $table = 'sys_menu';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'aba',    
        'descricao',
        'url',
        'icon',
        'tipo',
        'status'
    ];
    protected $returnType = 'object';

    public function listarMenus($grupo)
    {
        $builder = $this->db->table('sys_menu m');
        $builder->select("m.id, m.aba, m.url, m.icon, m.tipo");
        $builder->join("lnk_grupo_menu as lgm", "lgm.sys_menu_id = m.id");
        $builder->where("lgm.cad_grupo_id", $grupo); //1 - Gestor, 2 - Cliente
        $builder->where("m.status", "s");
        $builder->orderBy("m.aba");
        $query = $builder->get();
        return $query->getResult();
    }
}
