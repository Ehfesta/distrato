<!-- css -->
<link rel="stylesheet" href="<?= base_url() ?>/resources/css/perfil/style.css?v=<?=getenv('Version')?>">
<link rel="stylesheet" href="<?= base_url() ?>/resources/css/bootstrap.min.css?v=<?=getenv('Version')?>">
<link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?v=<?=getenv('Version')?>">
<link rel="stylesheet" href="<?= base_url() ?>/plugins/toastr/toastr.min.css?v=<?=getenv('Version')?>">
<link rel="stylesheet" href="<?= base_url() ?>/plugins/typeahead/bootstrap-tagsinput.css?v=<?=getenv('Version')?>">
<!-- js -->
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/jquery/jquery.mask.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/jquery-ui/jquery-ui.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/toastr/toastr.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/typeahead/typeahead.bundle.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/typeahead/bloodhound.min.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/plugins/typeahead/bootstrap-tagsinput.js?v=<?=getenv('Version')?>"></script>
<script src="<?= base_url() ?>/resources/js/Perfil/index.js?v0.2"></script>


<!-- Body -->
<div class="content-wrapper col-md-9" style="margin: auto !important;">
    <form action="../addPerfil" id="form_perfil" method="POST" enctype="multipart/form-data" style="height: max-content;">
        <div class="content-header" style="height: 50px;">
            <div class="">
                <button type="button" id="PerfilEdit" onclick="bntPerfilEdit('<?php echo $Cod; ?>1E');" class="btn btn-outline-primary btn-sm ml-2 float-right cvtVis"><i class="fas fa-edit"> Editar</i></button>
                <button type="button" id="PerfilSave" onclick="bntPerfilSave('<?php echo $Cod; ?>2E');" class="btn btn-outline-primary btn-sm ml-2 float-right cvtEdit"><i class="fas fa-save"> Salvar</i></button>
                <!-- <button type="submit" class="btn btn-outline-primary btn-sm ml-2 float-right cvtEdit"><i class="fas fa-save"> submit</i></button> -->
            </div>

        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Perfil</h3>
                <h3 class="card-title float-right"></h3>
            </div>
            <div class="row" style="justify-content: space-between;margin: 5px;">
                <div class="col-md-4 pt-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img id="UserImg" class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/resources/img/Perfil/<?php if($imgpessoa){ echo $imgpessoa;}else{echo "avatar.jpg";}?>" alt="User profile picture">
                            </div>
                            <div class="form-group cvtEdit">
                                <label for="customFile">Imagem</label>
                                <div class="input-group">
                                    <div class="custom-file col-md-12">
                                        <input type="file" class="custom-file-input" id="customFile" name="customFile" accept=".jpg, .bmp, .gif" onchange="preview()">
                                        <label class="custom-file-label" for="customFile"></label>
                                    </div>

                                </div>
                            </div>
                            <div class=" cvtEdit"><strong>Nome</strong></div>
                            <h3 class="profile-username text-center cvtVis"><?php echo $Nome; ?></h3>
                            <input type="text" id="selNome" name="selNome" class="form-control cvtEdit mt-2 mb-2" placeholder="Nome ..." value="<?php echo $Nome; ?>">
                            <div class=" cvtEdit"><strong>E-mail</strong></div>
                            <p class="text-muted text-center"><?php echo $Email; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Convites</b> <a class="float-right"><?php echo $TotalConvite; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Festas</b> <a class="float-right"><?php echo $TotalConvidado; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 pt-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sobre mim</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><i class="fas fa-birthday-cake mr-1"></i> <?php if($TipoConviteID=='1'){ echo "Nascido em";}else {echo "Desde";}?></strong>
                                    <p class="text-muted cvtVis mb-0"><?php echo $DataNascDesc; ?></p>
                                    <input type="text" id="selData" name="selData" class="form-control cvtEdit" placeholder="dd/mm/aaaa" value="<?php echo $DataNascDesc; ?>">
                                </div>
                                
                                <div class="col-md-4" <?php if($TipoConviteID=='2'){ echo 'style="visibility: hidden;"';}?>>
                                    <strong><i class="fas fa-venus-mars mr-1"></i> Sexo</strong>
                                    <p class="text-muted cvtVis mb-0"><?php echo $SexoDesc; ?></p>
                                    <select class="custom-select cvtEdit" id="selSexo" name="selSexo">
                                        <?php echo $selTipoSexo; ?>
                                    </select>
                                </div>
                            
                                <div class="col-md-4"  <?php if($TipoConviteID=='2'){ echo 'style="visibility: hidden;"';}?>>
                                    <strong><i class="far fa-heart mr-1"></i> Estado Civil</strong>
                                    <p class="text-muted cvtVis mb-0"><?php echo $EstadoCivilDesc; ?></p>
                                    <select class="custom-select cvtEdit" id="selEstadoCivil" name="selEstadoCivil">
                                        <?php echo $selTipoEstadoCivil; ?>
                                    </select>
                                </div>
            
                            </div>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Localização</strong>
                            <p class="text-muted cvtVis mb-0"><?php echo $Localizacao; ?></p>
                            <input type="text" id="selLocalizacao" name="selLocalizacao" class="form-control cvtEdit" placeholder="Nome ..." value="<?php echo $Localizacao; ?>">
                            <hr>
                            <strong><i class="far fa-file-alt mr-1"></i> O que gosta de fazer?</strong>
                            <p class="text-muted cvtVis mb-0"><?php echo $Descricao; ?></p>
                            <input type="text" id="selDescricao" name="selDescricao" class="form-control cvtEdit" placeholder="Nome ..." value="<?php echo $Descricao; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="justify-content: space-between;margin: 5px;">
                <div class="col-md-4 pt-3">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Media Social</h3>
                        </div>
                        <div class="card-body box-profile">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <a class="btn btn-media col-8" style="background-color: #3B5998;color: white;">
                                        <span class="fab fa-facebook"></span> Facebook
                                    </a>
                                    <?php
                                    if ($lnkFacebook!='') {
                                        echo '<i class="far fa-check-circle" style="color: #009b00;font-size: 24px;float: right;margin: 6px 25px 0px 0px;"></i>';
                                    }
                                    ?>
                                </li>
                                <li class="list-group-item">
                                    <a class="btn btn-media col-8" style="background-color: #125688;color: white;">
                                        <span class="fab fa-instagram"></span> Instagram
                                    </a>
                                    <?php
                                    if ($lnkInstagram!='') {
                                        echo '<i class="far fa-check-circle" style="color: #009b00;font-size: 24px;float: right;margin: 6px 25px 0px 0px;"></i>';
                                    }
                                    ?>
                                </li>
                                <!-- <li class="list-group-item">
                                    <a class="btn btn-media col-8" style="background-color: #55ACEE;color: white;">
                                        <span class="fab fa-twitter"></span> Twitter
                                    </a>
                                    <?php
                                    if ($lnkTwitter!='') {
                                        echo '<i class="far fa-check-circle" style="color: #009b00;font-size: 24px;float: right;margin: 6px 25px 0px 0px;"></i>';
                                    }
                                    ?>
                                </li>
                                <li class="list-group-item">
                                    <a class="btn btn-media col-8" style="background-color: #DD4B39;color: white;">
                                        <span class="fab fa-google"></span> Google
                                    </a>
                                    <?php
                                    if ($lnkGoogle!='') {
                                        echo '<i class="far fa-check-circle" style="color: #009b00;font-size: 24px;float: right;margin: 6px 25px 0px 0px;"></i>';
                                    }
                                    ?>
                                </li>
                                <li class="list-group-item">
                                    <a class="btn btn-media col-8" style="background-color: #007BB6;color: white;">
                                        <span class="fab fa-linkedin"></span> Linkedin
                                    </a>
                                    <?php
                                    if ($lnkLinkedin!='') {
                                        echo '<i class="far fa-check-circle" style="color: #009b00;font-size: 24px;float: right;margin: 6px 25px 0px 0px;"></i>';
                                    }
                                    ?>
                                </li> -->
                                <input type="text" id="lnkFacebook" name="lnkFacebook" class="invisible cvtEdit" value="<?php echo $lnkFacebook; ?>">
                                <input type="text" id="lnkInstagram" name="lnkInstagram" class="invisible cvtEdit" value="<?php echo $lnkInstagram; ?>">
                                <input type="text" id="lnkTwitter" name="lnkTwitter" class="invisible cvtEdit" value="<?php echo $lnkTwitter; ?>">
                                <input type="text" id="lnkGoogle" name="lnkGoogle" class="invisible cvtEdit" value="<?php echo $lnkGoogle; ?>">
                                <input type="text" id="lnkLinkedin" name="lnkLinkedin" class="invisible cvtEdit" value="<?php echo $lnkLinkedin; ?>">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 pt-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Preferencias</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <strong><i class="fas fa-music mr-1"></i> Tipos de Músicas (TAGs)</strong><br>
                                <p class="text-muted cvtVis mb-0"><?php echo $TagMusica; ?></p>
                                <input type="text" class="cvtEdit taginput" id="selTagMusica" name="selTagMusica" data-role="tagsinput" value="<?php echo $TagMusica; ?>" />
                            </div>
                            <hr>
                            <div class="form-group">
                                <strong><i class="fas fa-theater-masks mr-1"></i> Tipos de Eventos (TAGs)</strong><br>
                                <p class="text-muted cvtVis mb-0"><?php echo $TagEvento; ?></p>
                                <input type="text" class="cvtEdit taginput" id="selTagEvento" name="selTagEvento" data-role="tagsinput" value="<?php echo $TagEvento; ?>" />
                            </div>
                            <hr>
                            <div class="form-group">
                                <strong><i class="fas fa-utensils mr-1"></i> Tipos de Comidas (TAGs)</strong><br>
                                <p class="text-muted cvtVis mb-0"><?php echo $TagComida; ?></p>
                                <input type="text" class="cvtEdit taginput" id="selTagComida" name="selTagComida" data-role="tagsinput" value="<?php echo $TagComida; ?>" />
                            </div>
                            <hr>
                            <div class="form-group">
                                <strong><i class="fas fa-glass-cheers mr-1"></i> Tipos de Bebidas (TAGs)</strong><br>
                                <p class="text-muted cvtVis mb-0"><?php echo $TagBebida; ?></p>
                                <input type="text" class="cvtEdit taginput" id="selTagBebida" name="selTagBebida" data-role="tagsinput" value="<?php echo $TagBebida; ?>" />
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
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
    configCampos('<?php echo $cvtEditar; ?>');
</script>