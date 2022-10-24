<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelCadConviteVW;
use App\Models\modelLnkConviteConvidado;
use App\Models\modelLnkConviteConvidadoVW;
use App\Models\ModelCadConvite;
use App\Models\ModelstsConvite;
use App\Models\ModeltpoPublico;
use App\Models\ModeltpoEvento;
use App\Models\modelCadComentariosVW;
use App\Models\modelCadComentarios;

class Eventos extends BaseController
{
    public function __construct()
    {
        $this->cadConviteVW = new ModelCadConviteVW();
        $this->ConviteConvidado = new modelLnkConviteConvidado();
        $this->ConviteConvidadoVW = new modelLnkConviteConvidadoVW();
        $this->cadConvite = new ModelCadConvite();
        $this->stsConvite = new ModelstsConvite();
        $this->tpoPublico = new ModeltpoPublico();
        $this->tpoEvento = new ModeltpoEvento();
        $this->CadComentariosVW = new modelCadComentariosVW();
        $this->CadComentarios = new modelCadComentarios();
    }

    public function index()
    {
        echo view('fragments/header');
        echo view('eventos/index');
        echo view('fragments/footer');
    }
    public function CVD()
    {
        echo view('fragments/header');
        echo view('eventos/cvd');
        echo view('fragments/footer');
    }

    public function lista()
    {
        echo view('fragments/header');
        echo view('eventos/lista');
        echo view('fragments/footer');
    }


    public function listarVW()
    {
        $codUser = session()->get('Cod');
        // $result = $this->cadConviteVW->orderBy('DataEvento DESC')->getWhere(['cadUserID' => $codUser])->getResult();
        $result = $this->cadConviteVW->getWhere(['cadUserID' => $codUser, 'TipoConviteID' => '2'])->getResult();
        // var_dump($result);
        echo json_encode($result);
    }

    public function listarCVD()
    {
        $EmailUser = session()->get('Email');
        $codUser = session()->get('Cod');

        $sql = "SELECT * FROM vwlnkConviteConvidado where conv_Status>= 3 and ((UserEmail='$EmailUser' and TipoConviteID='2') or(UserEmail='' and TipoConviteID='2' and TipoConviteID='2' and conv_Cod not in (SELECT ConviteCod FROM lnkConviteConvidado where UserEmail='$EmailUser'))) order by conv_Status, DataConvite;";
        $result = $this->ConviteConvidadoVW->query($sql)->getResult();
        // $result = $this->ConviteConvidadoVW->orderBy('DataEvento')->getWhere(['TipoConviteID' => '2', 'Status' => '3'])->getResult();
        echo json_encode($result);
    }

    public function evento($cvtPar = '0')
    {

        $codUser = session()->get('Cod');
        $cvtEditar = substr($cvtPar, -2);
        $EventoCod = substr($cvtPar, 0, strlen($cvtPar) - 2);
        $dspBotoes = "";
        $dspPresente = '';


        if ($EventoCod != '00000') {
            $result = $this->cadConviteVW->getWhere(['Cod' => $EventoCod])->getRow();
        }

        if ($EventoCod != '00000' and $result) {
            // echo json_encode($result);
            // echo "<br>";

            $selTipoEvento = '';
            $Lresult = $this->tpoEvento->getWhere(['Ativo' => '1'])->getResult();
            foreach ($Lresult as $row) {
                if ($result->TipoEventoID == $row->ID) {
                    $selTipoEvento .= "<option value='$row->ID' selected='selected'>$row->Descricao</option>";
                } else {
                    $selTipoEvento .= "<option value='$row->ID'>$row->Descricao</option>";
                }
            }
            $selTipoPublico = '';
            $Lresult = $this->tpoPublico->getWhere(['Ativo' => '1'])->getResult();
            foreach ($Lresult as $row) {
                if ($result->TipoPublicoID == $row->ID) {
                    $selTipoPublico .= "<option value='$row->ID' selected='selected'>$row->Descricao</option>";
                } else {
                    $selTipoPublico .= "<option value='$row->ID'>$row->Descricao</option>";
                }
            }

            $selConvidar = ' ';
            $selCompartilha = ' ';
            $selListaConvidados = ' ';
            $selMuralRecado = ' ';
            $selPresenteVirtual = ' ';
            $dspBotoes = '';
            if ($codUser != $result->cadUserID) {
                $Lresult = $this->ConviteConvidado->getWhere(['ConviteCod' => $EventoCod, 'UserEmail' => session()->get('Email')])->getRow();
                $Confirm = '';
                if (isset($Lresult->Confirmado) and $Lresult->Confirmado == '1') {
                    $Confirm = '<span class="badge bg-success"><i class="fas fa-thumbs-up" style="font-size: 25px;color: white;margin-bottom: 5px;"></i></span>';
                } elseif (isset($Lresult->Confirmado) and $Lresult->Confirmado == '2') {
                    $Confirm = '<span class="badge bg-danger"><i class="fas fa-thumbs-down" style="font-size: 25px;color: white;margin-bottom: 5px;"></i></span>';
                }

                // Lista de Botoes
                $dspBotoes .= '<a class="btn btn-app bg-orange" title="Informar Presença / Ausência" data-toggle="modal" data-target="#modalConfirmacao">' . $Confirm . '<i class="fas fa-envelope"></i> RSVP</a>';
            }
            if ($result->Convidar == '0') {
                $dspBotoes .= '<a class="btn btn-app bg-purple" title="Levar Acompanhante"><i class="fa fa-user-plus"></i> + Conv</a>';
            } else {
                $selConvidar = 'checked';
            }
            if ($result->MuralRecado == '1') {
                $dspBotoes .= '<a class="btn btn-app bg-primary" onclick="btnComentarios(\'' . $EventoCod . '\', \'' . $codUser . '\')" data-toggle="modal" data-target="#modalComentarios" title="Comentários"><i class="fas fa-comments"></i> Msg</a>';
                $selMuralRecado = 'checked';
            }
            if ($result->Compartilhar == '1') {
                $dspBotoes .= '<a class="btn btn-app bg-pink" title="Compartilhar Convite" data-toggle="modal" data-target="#modalEnviarLink"><i class="fa fa-share-alt"></i> Enviar</a>';
                $selCompartilha = 'checked';
            }
            if ($result->ListaConvidados == '1') {
                $dspBotoes .= '
                <a class="btn btn-app bg-info" title="Lista de Convidados" data-toggle="modal" data-target="#modalConvidados">
                    <i class="fas fa-list"></i> Conv
                </a>';
                $selListaConvidados = 'checked';
            }

            if ($codUser != $result->cadUserID) {
                if ($result->PresenteVirtual == '1') {
                    $dspPresente .= '
                    <div class="info-box shadow-sm btmPresenteConvite">
                        <a class="btn btn-app bg-danger" style="font-size: 18px;height: 78px;" title="Presentear Virtual" data-toggle="modal" data-target="#modalPresente">
                            <i class="fa fa-gift" style="font-size: 28px;"></i> Presentear
                        </a>
                    </div>';

                    // $selPresenteVirtual = 'checked';
                }
            }

            if ($codUser == $result->cadUserID) {
                $bVoltar = 'Eventos';
            } else {
                $bVoltar = 'Eventos/CVD';
            }

            // $selTipoEvento = '';
            // $selTipoPublico = '';
            $data = array();
            $data['cvtEditar']          = $cvtEditar;
            $data['Titulo']             = $result->Titulo;
            $data['Status']             = $result->StatusDesc;
            $data['StatusCor']          = $result->StatusCor;
            $data['Evento']             = $result->Descricao;
            $data['EventoCod']          = $result->Cod;
            $data['DataEvento']         = $result->DataEventoDesc;
            $data['InicioEvento']       = $result->HoraInicio;
            $data['FimEvento']          = $result->HoraFim;
            $data['TipoEvento']         = $result->TipoEventoDesc;
            $data['selTipoEvento']      = $selTipoEvento;
            $data['selPresenteVirtual'] = $selPresenteVirtual;
            $data['TipoPublico']        = $result->TipoPublicoDesc;
            $data['selTipoPublico']     = $selTipoPublico;
            $data['Convidar']           = $result->ConvidarDesc;
            $data['selConvidar']        = $selConvidar;
            $data['selCompartilha']     = $selCompartilha;
            $data['selListaConvidados'] = $selListaConvidados;
            $data['selMuralRecado']     = $selMuralRecado;
            $data['Endereco']           = $result->Endereco;
            $data['Obs']                = $result->Obs;
            $data['btnVoltar']          = $bVoltar;


            $data['dspBotoes']          = $dspBotoes;
            $data['dspPresente']        = $dspPresente;
            $data['selComentarios']     = '';

            $data['imgConvite']         = 'resources/img/Convite/' . $EventoCod . '.jpg';
        } else {
            $result = $this->stsConvite->getWhere(['ID' => '1'])->getResult();
            $result = $result[0];

            $selTipoEvento = '';
            $Lresult = $this->tpoEvento->getWhere(['Ativo' => '1'])->getResult();
            foreach ($Lresult as $row) {
                $selTipoEvento .= "<option value='$row->ID'>$row->Descricao</option>";
            }
            $selTipoPublico = '';
            $Lresult = $this->tpoPublico->getWhere(['Ativo' => '1'])->getResult();
            foreach ($Lresult as $row) {
                $selTipoPublico .= "<option value='$row->ID'>$row->Descricao</option>";
            }

            $selConvidar = 'checked';
            $selCompartilha = 'checked';
            $selListaConvidados = 'checked';
            $selMuralRecado = 'checked';
            $selPresenteVirtual = 'checked';

            $data = array();
            $data['cvtEditar']          = $cvtEditar;
            $data['Titulo']             = "";
            $data['Status']             = $result->Descricao;
            $data['StatusCor']          = $result->Cor;
            $data['Evento']             = "";
            $data['EventoCod']          = "";
            $data['DataEvento']         = "";
            $data['InicioEvento']       = "";
            $data['FimEvento']          = "";
            $data['TipoEvento']         = "";
            $data['selTipoEvento']      = $selTipoEvento;
            $data['selPresenteVirtual'] = $selPresenteVirtual;
            $data['TipoPublico']        = "";
            $data['selTipoPublico']     = $selTipoPublico;
            $data['Convidar']           = "";
            $data['selConvidar']        = $selConvidar;
            $data['selCompartilha']     = $selCompartilha;
            $data['selListaConvidados'] = $selListaConvidados;
            $data['selMuralRecado']     = $selMuralRecado;
            $data['Endereco']           = "";
            $data['Obs']                = "";
            $data['imgConvite']         = "";
            $data['dspBotoes']          = $dspBotoes;
            $data['dspPresente']        = $dspPresente;
            $data['selComentarios']     = "";
            $data['btnVoltar']          = 'Eventos';
        }
        //  echo "<br>Aqui<br>";
        //  echo json_encode($data);

        echo view('fragments/header');
        echo view('eventos/evento', $data);
        echo view('fragments/footer');
    }

    public function updConvite()
    {

        $dataupd = date("Y-m-d H:i:s");
        $CodConv = $this->request->getVar('Cod');

        $dados = [
            "Titulo" => $this->request->getVar('Titulo'),
            "Descricao" => $this->request->getVar('Descricao'),
            "DataEvento" => $this->request->getVar('DataEvento'),
            "HoraInicio" => $this->request->getVar('HoraInicio'),
            "HoraFim" => $this->request->getVar('HoraFim'),
            "TipoEventoID" => $this->request->getVar('TipoEventoID'),
            "TipoPublicoID" => $this->request->getVar('TipoPublicoID'),
            "PresenteVirtual" => $this->request->getVar('PresenteVirtual') == "on" ? '1' : '0',
            "Convidar" => $this->request->getVar('Convidar') == "on" ? '1' : '0',
            "Compartilhar" => $this->request->getVar('Compartilhar') == "on" ? '1' : '0',
            "ListaConvidados" => $this->request->getVar('ListaConvidados' == "on") ? '1' : '0',
            "MuralRecado" => $this->request->getVar('MuralRecado') == "on" ? '1' : '0',
            "Endereco" => $this->request->getVar('Endereco'),
            "Obs" => $this->request->getVar('Obs'),
            "DataUpdate" => $dataupd
        ];
        
        $updConvite = $this->cadConvite->updCodConvite($CodConv, $dados);

        echo json_encode($updConvite);
    }
    public function addConvite()
    {

        //$Cod => $this->request->getVar('IDEvento'),
        $dataAdd = date("Y-m-d H:i:s");

        $codUsuario = session()->get('Cod');
        $dados = [
            "cadUserID" => $codUsuario,
            "Titulo" => $this->request->getVar('selTitulo'),
            "Status" => '1',
            "Descricao" => $this->request->getVar('selEvento'),
            "DataEvento" => $this->request->getVar('selDataEvento'),
            "HoraInicio" => $this->request->getVar('selHoraInicio'),
            "HoraFim" => $this->request->getVar('selHoraFim'),
            "TipoEventoID" => $this->request->getVar('selTipoEvento'),
            "TipoPublicoID" => $this->request->getVar('selTipoPublico'),
            "PresenteVirtual" => $this->request->getVar('selPresenteVirtual') == "on" ? '1' : '0',
            "Convidar" => $this->request->getVar('selConvidar') == "on" ? '1' : '0',
            "Compartilhar" => $this->request->getVar('selCompartilha') == "on" ? '1' : '0',
            "ListaConvidados" => $this->request->getVar('selListaConvidados' == "on") ? '1' : '0',
            "MuralRecado" => $this->request->getVar('selMuralRecado') == "on" ? '1' : '0',
            "Endereco" => $this->request->getVar('selEndereco'),
            "Obs" => $this->request->getVar('selObs'),
            "DataCriacao" => $dataAdd,
            "TipoConviteID" => '2'
        ];
        $dadosUp = [];
        $IDConv = $this->cadConvite->addConvite($dados);
        if ($IDConv > '0') {
            $CodConv = strtoupper(bin2hex(random_bytes(2)) . $IDConv . bin2hex(random_bytes(2)));
            if ($this->request->getFile('customFile')) {
                $img = $this->request->getFile('customFile');
                $imgnameOri = $img->getName();
                $imgext = substr($imgnameOri, -4);
                $imgname = $CodConv . $imgext;
                // var_dump($imgname);
                // echo "<br>";
                $img->move('resources/img/Convite', $imgname);

                $dadosUp = [
                    "Cod" => $CodConv,
                    "ImgOri" => $imgnameOri,
                    "Img" => $imgname
                ];
            } else {
                $dadosUp = [
                    "Cod" => $CodConv
                ];
            }
            $dadosAdd = [
                "ConviteCod" => $CodConv
            ];

            $updConvite = $this->cadConvite->updCodConvite($IDConv, $dadosUp);

            $IDConv = $this->ConviteConvidado->insert($dadosAdd);
        }

        echo json_encode($updConvite);
    }
    public function ConfConvite()
    {
        $return = 0;
        $DataConfirmado = date("Y-m-d H:i:s");

        $ConviteCod = $this->request->getVar('Convite');
        $ConviteCod = substr($ConviteCod, 0, strlen($ConviteCod) - 2);

        if ($this->request->getVar('Confirmado') == 'XP38') {
            $Confirmado = '1';
        } elseif ($this->request->getVar('Confirmado') == 'TF34') {
            $Confirmado = '2';
        } else {
            $Confirmado = '0';
        }

        $id = [
            "ConviteCod" => $ConviteCod,
            "UserEmail" => session()->get('Email')
        ];

        $dados = [
            "Confirmado" => $Confirmado,
            "DataConfirmado" => $DataConfirmado
        ];

        $confirmacao = $this->ConviteConvidado->ConfConvite($id, $dados);

        echo json_encode($confirmacao);
    }
    public function lstComentarios()
    {
        // Lista os Comentarios
        $ConviteCod = $this->request->getVar('Convite');
        $result = $this->CadComentariosVW->getWhere(['ConviteID' => $ConviteCod])->getResult();
        echo json_encode($result);
    }

    public function EnviaComentarios()
    {
        $Status = $this->request->getVar('Status');
        $UserCod = $this->request->getVar('UserCod');
        $Comentario = $this->request->getVar('Comentario');

        $ConviteCod = $this->request->getVar('ConviteID');

        $dados = [
            "ConviteID" => $ConviteCod,
            "Status" => $Status,
            "UserCod" => $UserCod,
            "Comentario" => $Comentario,
        ];
        // $result = $this->CadComentariosVW->getWhere(['ConviteID' => $ConviteCod])->getResult();
        $result = $this->CadComentarios->insert($dados);
        echo json_encode($result);
    }
}
