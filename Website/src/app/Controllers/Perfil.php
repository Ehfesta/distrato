<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\modelCadUsersVW;
use App\Models\modelCadUsers;
use App\Models\ModeltpoUserEstadoCivil;
use App\Models\ModeltpoUserSexo;

class Perfil extends BaseController
{
    public function __construct()
    {
        $this->CadUsersVW = new modelCadUsersVW();
        $this->CadUsers = new modelCadUsers();
        $this->tpoUserEstadoCivil = new ModeltpoUserEstadoCivil();
        $this->tpoUserSexo = new ModeltpoUserSexo();
    }

    public function index($CodUser = '0')
    {
        if (session()->get('Nome') and session()->get('Nome') != "") {
            if ($CodUser == '0') {
                $CodUser = session()->get('Cod') . "2E";
                $cvtEditar = "2E";
            } else {
                $cvtEditar = substr($CodUser, -2);
            }

            $rCadUser = $this->CadUsersVW->getWhere(['Cod' => session()->get('Cod')])->getRow();
            // return json_encode($rCadUser);

            $selTipoUserSexo = '';
            $Lresult = $this->tpoUserSexo->getWhere(['Ativo' => '1'])->getResult();
            foreach ($Lresult as $row) {
                if ($rCadUser->Sexo == $row->ID) {
                    $selTipoUserSexo .= "<option value='$row->ID' selected='selected'>$row->Descricao</option>";
                } else {
                    $selTipoUserSexo .= "<option value='$row->ID'>$row->Descricao</option>";
                }
            }

            $selTipoUserEstadoCivil = '';
            $Lresult = $this->tpoUserEstadoCivil->getWhere(['Ativo' => '1'])->getResult();
            foreach ($Lresult as $row) {
                if ($rCadUser->EstadoCivil == $row->ID) {
                    $selTipoUserEstadoCivil .= "<option value='$row->ID' selected='selected'>$row->Descricao</option>";
                } else {
                    $selTipoUserEstadoCivil .= "<option value='$row->ID'>$row->Descricao</option>";
                }
            }

            $data = array();
            $data['Cod'] = session()->get('Cod');
            $data['Email'] = session()->get('Email');
            $data['Nome'] = $rCadUser->Nome;
            $data['Senha'] = $rCadUser->Senha;
            $data['DataNasc'] = $rCadUser->Data;
            $data['DataNascDesc'] = $rCadUser->DataDesc;
            $data['Sexo'] = $rCadUser->Sexo;
            $data['SexoDesc'] = $rCadUser->SexoDesc;
            $data['EstadoCivil'] = $rCadUser->EstadoCivil;
            $data['EstadoCivilDesc'] = $rCadUser->EstadoCivilDesc;
            $data['Localizacao'] = $rCadUser->Localizacao;
            $data['Descricao'] = $rCadUser->Descricao;
            $data['TagMusica'] = $rCadUser->TagMusica;
            $data['TagEvento'] = $rCadUser->TagEvento;
            $data['TagComida'] = $rCadUser->TagComida;
            $data['TagBebida'] = $rCadUser->TagBebida;
            $data['lnkFacebook'] = $rCadUser->lnkFacebook;
            $data['lnkInstagram'] = $rCadUser->lnkInstagram;
            $data['lnkTwitter'] = $rCadUser->lnkTwitter;
            $data['lnkGoogle'] = $rCadUser->lnkGoogle;
            $data['lnkLinkedin'] = $rCadUser->lnkLinkedin;
            $data['TotalConvite'] = $rCadUser->TotalConvite;
            $data['TotalConvidado'] = $rCadUser->TotalConvidado;
            $data['selTipoSexo'] = $selTipoUserSexo;
            $data['selTipoEstadoCivil'] = $selTipoUserEstadoCivil;
            $data['CodUser'] = $CodUser;
            $data['cvtEditar'] = $cvtEditar;
            $data['TipoConviteID'] = session()->get('TipoConviteID');
            $data['imgpessoa'] = session()->get('imgpessoa');
            
            echo view('fragments/header');
            echo view('perfil/index', $data);
            echo view('fragments/footer');
        } else {
            unset(
                $_SESSION['Cod'],
                $_SESSION['Email'],
                $_SESSION['Nome'],
                $_SESSION['TipoConviteID'],
                $_SESSION['imgpessoa']
            );

            header("Location: " . base_url());
            exit();
        }
    }

    public function updPerfil()
    {
        $dataupd = date("Y-m-d H:i:s");
        $Cod = $this->request->getVar('Cod');
        $dados = [];
        if ($this->request->getFile('customFile')->isValid()) {
            $img = $this->request->getFile('customFile');
            $imgext = substr($img->getName(), -4);
            $imgname = $Cod . $imgext;
            $imgpath = 'resources/img/Perfil/'.$imgname;
            if (file_exists($imgpath)) {
                unlink($imgpath);
            }
            $img->move('resources/img/Perfil', $imgname);
            $dados += ["imgpessoa" => $imgname];
        }

        $Data = $this->request->getVar('Data');
        if($Data){
            $Data = substr($Data,-4)."-".substr($Data,3,2)."-".substr($Data,0,2);
            $dados += ["Data" => date("Y-m-d", strtotime($Data))];
        }
        $dados += [
            "Nome" => $this->request->getVar('Nome'),
            "Sexo" => $this->request->getVar('Sexo'),
            "EstadoCivil" => $this->request->getVar('EstadoCivil'),
            "Localizacao" => $this->request->getVar('Localizacao'),
            "Descricao" => $this->request->getVar('Descricao'),
            "TagMusica" => $this->request->getVar('TagMusica'),
            "TagEvento" => $this->request->getVar('TagEvento'),
            "TagComida" => $this->request->getVar('TagComida'),
            "TagBebida" => $this->request->getVar('TagBebida'),
            "lnkFacebook" => $this->request->getVar('lnkFacebook'),
            "lnkInstagram" => $this->request->getVar('lnkInstagram'),
            "lnkTwitter" => $this->request->getVar('lnkTwitter'),
            "lnkGoogle" => $this->request->getVar('lnkGoogle'),
            "lnkLinkedin" => $this->request->getVar('lnkLinkedin'),
            "Alterado" => $dataupd
        ];
        $updConvite = $this->CadUsers->updPerfil($Cod, $dados);

        session()->set("Nome", $this->request->getVar('Nome'));
        if ($this->request->getFile('customFile')->isValid()) {
            session()->set("imgpessoa", $imgname);
        }
        echo json_encode($updConvite);
    }

    public function listarVW()
    {
        // $result = $this->cadConviteVW->getWhere(['Cod' => $Cod])->getResult();
        $result = $this->cadConviteVW->findAll();
        echo json_encode($result);
    }
}
