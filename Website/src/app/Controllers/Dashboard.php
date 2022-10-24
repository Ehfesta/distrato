<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if(session()->get('Nome') and session()->get('Nome')!=""){
            $data = array();
            $data['NomePessoa'] = session()->get('Nome');
            $data['EmailPessoa'] = session()->get('Email');
            $data['CodPessoa'] = session()->get('Cod');
            $data['imgpessoa'] = session()->get('imgpessoa');
            $data['TipoConviteID'] = session()->get('TipoConviteID');
            
            if(session()->get('imgpessoa')){ 
                $imgpessoa=session()->get('imgpessoa');
            }else{
                $imgpessoa="avatar.jpg";
            }


            if(session()->get('TipoConviteID')=='1'){
                $menuConvite = '
                    <li class="nav-item">
                        <a href="Convites/convite/000001E" class="nav-link">
                            <i class="nav-icon fas fa-ticket-alt"></i>
                            <p>
                                Novo Convite
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Convites" class="nav-link">
                            <i class="nav-icon fas fa-id-card-alt"></i>
                            <p>
                                Meus Convites
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Convites/CVD" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i></i>
                            <p>
                                Convite Recebido
                            </p>
                        </a>
                    </li>
                ';

                $menuEvento = '
                    <li class="nav-item">
                        <a href="Eventos/CVD" class="nav-link">
                            <i class="nav-icon far fa-address-book"></i>
                            <p>
                                Buscar Eventos
                            </p>
                        </a>
                    </li>
                ';
            } else {
                $menuConvite = '';

                $menuEvento = '
                    <li class="nav-item">
                        <a href="Eventos/evento/000001E" class="nav-link">
                            <i class="nav-icon far fa-calendar-plus"></i></i>
                            <p>
                                Novo Evento
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Eventos" class="nav-link">
                            <i class="nav-icon far fa-calendar-check"></i>
                            <p>
                                Meus Eventos
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Eventos/CVD" class="nav-link">
                            <i class="nav-icon far fa-address-book"></i>
                            <p>
                                Buscar Eventos
                            </p>
                        </a>
                    </li>
                ';
            }

            $data['MenuConvite'] = $menuConvite;
            $data['MenuEvento'] = $menuEvento;

            echo view('dashboard/index',$data);
        }else{
            unset(
                $_SESSION['Cod'],
                $_SESSION['Email'],
                $_SESSION['Nome'],
                $_SESSION['imgpessoa'],
                $_SESSION['TipoConviteID'],
            );

            header("Location: ".base_url()); 
            exit();
        }
    }
}
