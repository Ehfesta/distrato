<!-- css -->
<link rel="stylesheet" href="<?= base_url() ?>/resources/css/Convite/style.css?v=<?=getenv('Version')?>">
<link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?v=<?=getenv('Version')?>">
<link rel="stylesheet" href="<?= base_url() ?>/plugins/toastr/toastr.min.css?v=<?=getenv('Version')?>">
<!-- js -->
<script src="<?= base_url() ?>/resources/js/Convites/convite.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/toastr/toastr.min.js?v=<?=getenv('Version')?>"></script>

<!-- Modal Convite -->
<div class="modal fade show" id="modalConvite" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <img src="<?= base_url() ?>/resources/img/0/Convite/Conv_3.jpg">
    </div>

</div>
<!-- Modal Mapa -->
<div class="modal fade show" id="modalMapa" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Endereço</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="height: 500px;">
                <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                    <iframe src="https://maps.google.com/maps?q=Av. Kennedy, 180&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal Confirmacao -->
<div class="modal fade show" id="modalConfirmacao" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-outline-success btn-block swalPresencaConfirmada" style="display: inline-flex;">
                    <div class="input-group-prepend">
                        <i class="far fa-thumbs-up" style="font-size: 23px;"></i>
                    </div>
                    <span style="margin: auto;">Confirmar presença</span>
                </button>
                <button type="button" class="btn btn-outline-danger btn-block" style="display: inline-flex;">
                    <div class="input-group-prepend">
                        <i class="far fa-thumbs-down" style="font-size: 23px;"></i>
                    </div>
                    <span style="margin: auto;">Não poderei comparecer</span>
                </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Comentarios -->
<div class="modal fade show" id="modalComentarios" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Comentários</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="height: 500px;">
                <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                    <div class="card-header">
                        
                    </div>

                    <div class="card-body">

                        <div class="direct-chat-messages">

                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                </div>

                                <img class="direct-chat-img" src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="Message User Image">

                                <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                </div>

                            </div>


                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                </div>

                                <img class="direct-chat-img" src="https://adminlte.io/themes/v3/dist/img/user3-128x128.jpg" alt="Message User Image">

                                <div class="direct-chat-text">
                                    You better believe it!
                                </div>

                            </div>

                        </div>


                        <div class="direct-chat-contacts">
                            <ul class="contacts-list">
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                                        <div class="contacts-list-info">
                                            <span class="contacts-list-name">
                                                Count Dracula
                                                <small class="contacts-list-date float-right">2/28/2015</small>
                                            </span>
                                            <span class="contacts-list-msg">How have you been? I was...</span>
                                        </div>

                                    </a>
                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="card-footer">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Body -->
<div class="content-wrapper col-md-10" style="margin: auto !important;">
    <div class="content-header">
        <div class="">
            <button type="button" onclick="bntCardConvite();" class="btn btn-outline-primary btn-sm ml-2"><i class="fa fa-id-card"> Voltar</i></button>
        </div>

    </div>

    <div class="card card-warning ">
        <div class="card-header">
            <h3 class="card-title">Casamento de Jessica & Marcelo</h3>
            <h3 class="card-title float-right">Divulgado</h3>
        </div>
        <div class="card-body bodyConvite">
            <div class="row col-md-12">
                <!-- Convite -->
                <div class="col-md-6">
                    <img src="<?= base_url() ?>/resources/img/0/Convite/Conv_3.jpg" class="img-convite" data-toggle="modal" data-target="#modalConvite">
                </div>
                <!-- Campos -->
                <div class="col-md-6">
                    <!-- Acoes -->
                    <div class="info-box shadow-sm" style="justify-content: space-between;">
                        <span class="info-box-icon bg-orange elevation-1 btnAcaoConvite" title="Informar Presença / Ausência" data-toggle="modal" data-target="#modalConfirmacao">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                        </span>
                        <span class="info-box-icon bg-purple elevation-1 btnAcaoConvite" title="Levar Convidado">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </span>
                        <span class="info-box-icon bg-primary elevation-1 btnAcaoConvite" title="Enviar Comentário" data-toggle="modal" data-target="#modalComentarios">
                            <i class="fas fa-comments" aria-hidden="true"></i>
                        </span>
                        <span class="info-box-icon bg-pink elevation-1 btnAcaoConvite" title="Compartilhar Convite">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                        </span>
                    </div>
                    <!-- Presente virtual -->
                    <div class="info-box shadow-sm btmPresenteConvite">
                        <span class="info-box-icon bg-danger"><i class="fa fa-gift"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Presente Virtual</span>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-success"><i class="far fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <div class="row" style="justify-content: space-between;margin: 5px;">
                                <div class="form-group  col-md-4">
                                    <label style="margin: 0px !important;">Data do evento</label><br>
                                    <span class="cvtVis" style="margin-left: 5px !important;"><i>21/05/2022</i></span>
                                    <div class="input-group date cvtEdit" id="txtDataEvento" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#txtDataEvento" placeholder="dd/mm/aaaa">
                                        
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label style="margin: 0px !important;">Início</label><br>
                                    <span class="cvtVis" style="margin-left: 5px !important;"><i>20:00</i></span>
                                    <input type="text" class="form-control datetimepicker-input cvtEdit" data-target="#txtHoraInicio" placeholder="hh:mm">
                                        
                                </div>
                                <div class="form-group  col-md-3">
                                    <label style="margin: 0px !important;">Término</label><br>
                                    <span class="cvtVis" style="margin-left: 5px !important;"><i>24:00</i></span>
                                    <input type="text" class="form-control datetimepicker-input cvtEdit" data-target="#txtHoraInicio" placeholder="hh:mm">
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
                        <div class="info-box-content">
                            <div class="row" style="justify-content: space-between;margin: 5px;">
                                <div class="form-group col-md-4">
                                    <label style="margin: 0px !important;">Tipo do Evento</label><br>
                                    <span class="cvtVis" style="margin-left: 5px !important;"><i>Casamento</i></span>
                                    <select class="custom-select cvtEdit " id="selTipoEvento">
                                        <option>Aniversário</option>
                                        <option>Casamento</option>
                                        <option>Confraternização</option>
                                        <option>Batizado</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label style="margin: 0px !important;">Público</label><br>
                                    <span style="margin-left: 5px !important;"><i>Privado</i></span>
                                </div>
                                <div class="form-group ">
                                    <label style="margin: 0px !important;">Levar Convidado</label><br>
                                    <span style="margin-left: 5px !important;"><i>Não</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-box shadow-sm modalMapa" data-toggle="modal" data-target="#modalMapa">
                        <span class="info-box-icon bg-navy"><i class="far fa-flag"></i></span>
                        <div class="info-box-content">
                            <div class="row" style="justify-content: space-between;margin: 5px;">
                                <div class="form-group">
                                    <label style="margin: 0px !important;">Endereço</label><i class="fa fa-search-plus float-right"></i><br>
                                    <span style="margin-left: 5px !important;"><i>Av. Kennedy, 180 - Jardim do Mar, São Bernardo do Campo - SP, 09726-251</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>