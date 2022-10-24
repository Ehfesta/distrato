<!-- css -->
<link rel="stylesheet" href="<?= base_url() ?>/resources/css/Convite/style.css?v=<?= getenv('Version') ?>">
<link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?v=<?= getenv('Version') ?>">
<link rel="stylesheet" href="<?= base_url() ?>/plugins/toastr/toastr.min.css?v=<?= getenv('Version') ?>">
<!-- js -->
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js?v=<?= getenv('Version') ?>"></script>
<script src="<?= base_url() ?>/plugins/jquery-ui/jquery-ui.min.js?v=<?= getenv('Version') ?>"></script>
<script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.min.js?v=<?= getenv('Version') ?>"></script>
<script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js?v=<?= getenv('Version') ?>"></script>
<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.js?v=<?= getenv('Version') ?>"></script>
<script src="<?= base_url() ?>/plugins/toastr/toastr.min.js?v=<?= getenv('Version') ?>"></script>
<script src="<?= base_url() ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js?v=<?= getenv('Version') ?>"></script>
<script src="<?= base_url() ?>/resources/js/Convites/convite.js?v0.2"></script>

<!-- Modal Convite -->
<div class="modal fade show" id="modalConvite" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <img src="<?= base_url() ?>/<?php echo $imgConvite; ?>">
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
                    <iframe src="https://maps.google.com/maps?q=<?php echo $Endereco; ?>&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                <button type="button" onclick="ConfConviteOK('<?php echo $EventoCod; ?>2E')" class="btn btn-outline-success btn-block swalPresencaConfirmada" style="display: inline-flex;">
                    <div class="input-group-prepend">
                        <i class="far fa-thumbs-up" style="font-size: 23px;"></i>
                    </div>
                    <span style="margin: auto;">Confirmar presença</span>
                </button>
                <button type="button" onclick="ConfConviteOff('<?php echo $EventoCod; ?>2E')" class="btn btn-outline-info btn-block" style="display: inline-flex;">
                    <div class="input-group-prepend">
                        <i class="fas fa-ban" style="font-size: 23px;"></i>
                    </div>
                    <span style="margin: auto;">Ainda não sei</span>
                </button>
                <button type="button" onclick="ConfConviteNao('<?php echo $EventoCod; ?>2E')" class="btn btn-outline-danger btn-block" style="display: inline-flex;">
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
<!-- modal AddConvidado -->
<div class="modal fade show" id="modalAddConvidado" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Levar Acompanhante</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../addConvidado" id="form_convidado" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label style="margin: 0px !important;">Nome<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                        <input type="text" id="selNome" name="selNome" class="form-control" placeholder="Nome ...">
                    </div>
                    <div class="form-group col-md-12">
                        <label style="margin: 0px !important;">E-mail</label><br>
                        <input type="text" id="selEmail" name="selEmail" class="form-control" placeholder="E-mail ...">
                    </div>
                    <div class="form-group col-md-12">
                        <label style="margin: 0px !important;">Parentesco</label><br>
                        <input type="text" id="selParentesco" name="selParentesco" class="form-control" placeholder="Parentesco ...">
                    </div>
                    <div class="form-group col-md-12">
                        <label style="margin: 0px !important;">Detalhe</label><br>
                        <input type="text" id="selDetalhe" name="selDetalhe" class="form-control" placeholder="Detalhe ...">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-default bg-success" onclick="bntAddConvidado('<?php echo $EventoCod; ?>','<?php echo session()->get('Email'); ?>');">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal EnviarLink -->
<div class="modal fade show" id="modalEnviarLink" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Compartilhar Link</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../EnviarLink" id="form_EnviarLink" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label style="margin: 0px !important;">E-mail<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                        <input type="text" id="selLinkEmail" name="selLinkEmail" class="form-control" placeholder="E-mail ...">
                    </div>
                    <div class="form-group col-md-12">
                        <label style="margin: 0px !important;">Comentário</label><br>
                        <textarea class="form-control" id="selLinkDetalhe" name="selLinkDetalhe" rows="4" placeholder="Comentário ..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-default bg-success" onclick="bntEnviarLink('<?php echo $EventoCod; ?>');" data-dismiss="modal">Enviar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal Presente -->
<div class="modal fade show" id="modalPresente" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Presente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 ">
                    <h3 class="text-primary"><i class="fa fa-gift"></i> Presente Virtual</h3>
                    <p class="text-muted">"Mudar tosso esse texto!!! Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
                    <br>
                </div>
                <div class="custom-control custom-checkbox col-12" style="margin: auto;margin-top: 15px;">
                    <input type="checkbox" name="terms" class="custom-control-input" id="terms" aria-describedby="terms-error" aria-invalid="false">
                    <label class="custom-control-label" for="terms">Eu aceito os <a href="<?= base_url() ?>/resources/terms/TermosUsuario.pdf" target="blank">Termos de Serviço</a>.</label>
                </div>
                <button type="button" class="btn btn-outline-success btn-block col-6" style="display: inline-flex;">
                    <div class="input-group-prepend">
                        <i class="fa fa-gift" style="font-size: 23px;"></i>
                    </div>
                    <span style="margin: auto;">Presentear</span>
                </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal Convidados -->
<div class="modal fade show" id="modalConvidados" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Convidados - Total: <?php echo $totalConvidados; ?></h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>Nome</th>
                                <th>Detalhe</th>
                                <th>Acompanhantes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $dspConvidados; ?>
                        </tbody>
                    </table>
                </div>
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
            <div class="modal-body">
                <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                    <div class="card-header">

                    </div>

                    <div class="card-body">
                        <div id="direct-chat-messages" class="direct-chat-messages">
                            <?php echo $selComentarios; ?>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" id="ComMessage" name="ComMessage" placeholder="Sua menssagem ..." class="form-control">
                            <span class="input-group-append">
                                <button onclick="bntComentarioSend('<?php echo $EventoCod; ?>','<?php echo session()->get('Cod'); ?>')" class="btn btn-primary">Enviar</button>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Body -->
<div class="content-wrapper col-md-12" style="margin: auto !important;">
    <form action="../addConvite" id="form_convite" method="POST" enctype="multipart/form-data">
        <div class="content-header" style="height: 50px;">
            <div class="">
                <button type="button" id="ConviteVoltar" onclick="bntCardConvite('<?php echo $btnVoltar; ?>');" class="btn btn-outline-primary btn-sm ml-2"><i class="fas fa-arrow-left"> Voltar</i></button>
                <?php
                if ($Proprietario == '1') {
                    echo '<button type="button" id="ConviteEdit" onclick="bntConviteEdit(\'' . $EventoCod . '1E\');" class="btn btn-outline-primary btn-sm ml-2 float-right cvtVis"><i class="fas fa-edit"> Editar</i></button>';
                }
                ?>
                <button type="button" id="ConviteSave" onclick="bntConviteSave('<?php echo $EventoCod; ?>2E');" class="btn btn-outline-primary btn-sm ml-2 float-right cvtEdit"><i class="fas fa-save"> Salvar</i></button>
                <button type="button" id="ConviteAdd" onclick="bntConviteAdd();" class="btn btn-outline-primary btn-sm ml-2 float-right cvtEdit"><i class="fas fa-save"> Gerar</i></button>
                <!-- <button type="submit" class="btn btn-outline-primary btn-sm ml-2 float-right cvtEdit"><i class="fas fa-save"> submit</i></button> -->
            </div>

        </div>
        <div class="card card-<?php echo $StatusCor; ?>">
            <div class="card-header">
                <h3 class="card-title"><?php echo $Titulo; ?></h3>
                <h3 class="card-title float-right"><?php echo $Status; ?></h3>
            </div>
            <div class="card-body bodyConvite">
                <!-- <form id="formConvite"> -->
                <div class="row col-md-12">
                    <!-- Convite -->
                    <div class="col-md-5">
                        <div class="form-group cvtEdit">
                            <label for="customFile">Imagem do Convite</label>
                            <div class="input-group">
                                <div class="custom-file col-md-10">
                                    <input type="file" class="custom-file-input" id="customFile" name="customFile" accept=".jpg, .bmp, .gif" onchange="preview()">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>

                            </div>
                            <!-- <label for="exampleInputFile">Nome_do_arquivo.jpg</label>
                            <button type="button" id="ConviteAdd" onclick="bntDeletaImg();" class="btn btn-outline-danger btn-sm ml-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        <br> -->
                            <br>
                        </div>
                        <?php
                        if ($imgConvite) {
                            echo "<img src='" . base_url() . "/" . $imgConvite . "' class='img-convite' data-toggle='modal' data-target='#modalConvite'>";
                        } else {
                            echo "<img id='CoviteImg' src='' class='img-convite' data-toggle='modal' data-target='#modalConvite'>";
                        }
                        ?>


                    </div>
                    <!-- Campos -->
                    <div class="col-md-7">
                        <!-- Acoes -->
                        <div class="info-box shadow-sm cvtVis" style="justify-content: space-between;">
                            <?php echo $dspBotoes; ?>
                        </div>
                        <!-- Presente virtual -->
                        <?php echo $dspPresente; ?>

                        <!-- Info -->

                        <!-- Calendario -->
                        <div class="info-box shadow-sm">
                            <span class="info-box-icon bg-success"><i class="far fa-calendar-alt"></i></span>
                            <div class="info-box-content" style="justify-content: space-between;">
                                <div class="row ConvitCad" style="justify-content: space-between;margin: 5px;">
                                    <div class="form-group col-md-8">
                                        <label style="margin: 0px !important;">Título<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                                        <span class="cvtVis" id="spanTitulo" style="margin-left: 5px !important;"><i><?php echo $Titulo; ?></i></span>
                                        <input type="text" id="selTitulo" name="selTitulo" class="form-control cvtEdit" placeholder="Titulo ..." value="<?php echo $Titulo; ?>">
                                    </div>
                                </div>
                                <div class="row" style="justify-content: space-between;margin: 5px;">
                                    <div class="form-group col-md-8">
                                        <label style="margin: 0px !important;">Descrição</label><br>
                                        <span class="cvtVis" id="spanEvento" style="margin-left: 5px !important;"><i><?php echo $Evento; ?></i></span>
                                        <input type="text" id="selEvento" name="selEvento" class="form-control cvtEdit" placeholder="Evento ..." value="<?php echo $Evento; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label style="margin: 0px !important;">ID do Evento</label><br>
                                        <span id="spanIDEvento" name="IDEvento" style="margin-left: 5px !important;"><i><?php echo $EventoCod; ?></i></span>
                                    </div>
                                </div>
                                <div class="row" style="justify-content: space-between;margin: 5px;">
                                    <div class="form-group  col-md-4">
                                        <label style="margin: 0px !important;">Data do evento<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                                        <span id="spanDataEvento" class="cvtVis" style="margin-left: 5px !important;"><i><?php echo $DataEvento; ?></i></span>
                                        <div class="input-group date cvtEdit" id="txtDataEvento" data-target-input="nearest">
                                            <input type="text" id="selDataEvento" name="selDataEvento" class="form-control datetimepicker-input" data-target="#txtDataEvento" placeholder="dd/mm/aaaa" value="<?php echo $DataEvento; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label style="margin: 0px !important;">Início<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                                        <span class="cvtVis" id="spanHoraInicio" style="margin-left: 5px !important;"><i><?php echo $InicioEvento; ?></i></span>
                                        <input type="text" id="selHoraInicio" name="selHoraInicio" class="form-control datetimepicker-input cvtEdit" data-target="#txtHoraInicio" placeholder="hh:mm" value="<?php echo $InicioEvento; ?>">

                                    </div>
                                    <div class="form-group  col-md-3">
                                        <label style="margin: 0px !important;">Término</label><br>
                                        <span class="cvtVis" id="spanHoraFim" style="margin-left: 5px !important;"><i><?php echo $FimEvento; ?></i></span>
                                        <input type="text" id="selHoraFim" name="selHoraFim" class="form-control datetimepicker-input cvtEdit" data-target="#txtHoraFim" placeholder="hh:mm" value="<?php echo $FimEvento; ?>">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Informacao -->
                        <div class="info-box shadow-sm" style="justify-content: space-between;">
                            <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
                            <div class="info-box-content">
                                <!-- linha1 -->
                                <div class="row" style="justify-content: space-between;margin: 5px;">
                                    <div class="form-group col-md-4">
                                        <label style="margin: 0px !important;">Tipo do Evento</label><br>
                                        <span class="cvtVis" style="margin-left: 5px !important;" id="spanTipoEvento"><i><?php echo $TipoEvento; ?></i></span>
                                        <select class="custom-select cvtEdit" id="selTipoEvento" name="selTipoEvento">
                                            <?php echo $selTipoEvento; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="margin: 0px !important;">Público</label><br>
                                        <span class="cvtVis" style="margin-left: 5px !important;" id="spanTipoPublico"><i><?php echo $TipoPublico; ?></i></span>
                                        <select class="custom-select form-control cvtEdit" id="selTipoPublico" name="selTipoPublico">
                                            <?php echo $selTipoPublico; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label style="margin: 0px !important;">Individual</label>
                                        <i class="far fa-question-circle" style="font-size: 13px;" title="Convite individual, somente uma pessoas por convite."></i><br>
                                        <span class="cvtVis" style="margin-left: 5px !important;" id="spanConvidar"><i><?php echo $Convidar; ?></i></span>
                                        <div class="custom-control custom-switch cvtEdit">
                                            <input type="checkbox" class="custom-control-input" id="selConvidar" name="selConvidar" <?php echo $selConvidar; ?>>
                                            <label class="custom-control-label" for="selConvidar"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Linha2 -->
                                <div class="row" style="justify-content: space-between;margin: 5px;">
                                    <div class="form-group col-md-3 cvtEdit">
                                        <label style="margin: 0px !important;">Compartilhar</label>
                                        <i class="far fa-question-circle" style="font-size: 13px;" title="Permite o convidado compartilhar o convite."></i><br>
                                        <!-- <span class="cvtVis" style="margin-left: 5px !important;" id="spanCompartilha"><i>Não</i></span> -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="selCompartilha" name="selCompartilha" <?php echo $selCompartilha; ?>>
                                            <label class="custom-control-label" for="selCompartilha"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 cvtEdit">
                                        <label style="margin: 0px !important;">Lista Convidados</label>
                                        <i class="far fa-question-circle" style="font-size: 13px;" title="Exibe lista de Convidados já confimardos para os demais convidados."></i><br>
                                        <!-- <span class="cvtVis" style="margin-left: 5px !important;" id="spanListaConvidados"><i>Não</i></span> -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="selListaConvidados" name="selListaConvidados" <?php echo $selListaConvidados; ?>>
                                            <label class="custom-control-label" for="selListaConvidados"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 cvtEdit">
                                        <label style="margin: 0px !important;">Mural de Recados</label>
                                        <i class="far fa-question-circle" style="font-size: 13px;" title="Permite mural de recados para os convidados deixarem recados."></i><br>
                                        <!-- <span class="cvtVis" style="margin-left: 5px !important;" id="spanMuralRecado"><i>Não</i></span> -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="selMuralRecado" name="selMuralRecado" <?php echo $selMuralRecado; ?>>
                                            <label class="custom-control-label" for="selMuralRecado"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Endereço -->
                        <div class="info-box shadow-sm">
                            <span class="info-box-icon bg-navy modalMapa" data-toggle="modal" data-target="#modalMapa"><i class="far fa-flag"></i></span>
                            <div class="info-box-content">
                                <div class="row" style="justify-content: space-between;margin: 5px;">
                                    <div class="form-group col-md-12">
                                        <label style="margin: 0px !important;">Endereço<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><i class="fa fa-search-plus float-right modalMapa" data-toggle="modal" data-target="#modalMapa"></i><br>
                                        <span class="cvtVis" style="margin-left: 5px !important;"><i><?php echo $Endereco; ?></i></span>
                                        <textarea id="selEndereco" name="selEndereco" class="form-control cvtEdit" rows="3" placeholder="Endereço ..."><?php echo $Endereco; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Observação -->
                        <div class="info-box shadow-sm">
                            <span class="info-box-icon bg-gray"><i class="fas fa-bullhorn"></i></span>
                            <div class="info-box-content">
                                <div class="row" style="justify-content: space-between;margin: 5px;">
                                    <span class="cvtVis" id="spanObs" style="margin-left: 5px !important;" id="spanObs"><i><?php echo $Obs; ?></i></span>
                                    <textarea class="form-control cvtEdit" id="selObs" name="selObs" rows="4" placeholder="Observações ..."><?php echo $Obs; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </form>
</div>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    configCampos('<?php echo $cvtEditar; ?>', '<?php echo $EventoCod; ?>');
</script>