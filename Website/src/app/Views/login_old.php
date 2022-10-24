<!DOCTYPE html>
<html lang="pt-br">

<head>
  <style>
    .alert {
      padding: 0 1.25rem !important;
    }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eh Festa</title>

  <!-- css -->
  <link rel="stylesheet" href="<?= base_url() ?>/resources/css/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url() ?>/resources/plugins/fontawesome-free/css/all.min.css?v=<?=getenv('Version')?>">
  <link rel="stylesheet" href="<?= base_url() ?>/resources/plugins/bootstrap-social/bootstrap-social.css?v=<?=getenv('Version')?>">
  <link rel="stylesheet" href="<?= base_url() ?>/resources/css/icheck-bootstrap.min.css?v=<?=getenv('Version')?>">
  <link rel="stylesheet" href="<?= base_url() ?>/resources/css/adminlte.min.css?v=<?=getenv('Version')?>">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?v=<?=getenv('Version')?>">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/toastr/toastr.min.css?v=<?=getenv('Version')?>">
  <!-- js -->
  <script src="<?= base_url() ?>/resources/js/adminlte.min.js?v=<?=getenv('Version')?>"></script>
  <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js?v=<?=getenv('Version')?>"></script>
  <script src="<?= base_url() ?>/plugins/jquery-ui/jquery-ui.min.js?v=<?=getenv('Version')?>"></script>
  <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.min.js?v=<?=getenv('Version')?>"></script>
  <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js?v=<?=getenv('Version')?>"></script>
  <script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.js?v=<?=getenv('Version')?>"></script>
  <script src="<?= base_url() ?>/plugins/toastr/toastr.min.js?v=<?=getenv('Version')?>"></script>
  <script src="<?= base_url() ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js?v=<?=getenv('Version')?>"></script>
  <script src="<?= base_url() ?>/resources/js/login/index.js?v0.2"></script>
</head>



<body class="hold-transition login-page">
  <!-- Modal Usuario -->
  <div class="modal fade show" id="modalUsuario" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Criar usuário</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card card-primary">
            <form id="quickForm" novalidate="novalidate">
              <div class="card-body">
                <div class="row" style="justify-content: space-between;margin: 5px;">
                  <div class="form-group col-md-6">
                    <label style="margin: 0px !important;">E-mail<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                    <input type="text" id="selEmail" name="selEmail" class="form-control" placeholder="Email ...">
                  </div>
                  <div class="form-group col-md-6">
                    <label style="margin: 0px !important;">Nome<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                    <input type="text" id="selNome" name="selNome" class="form-control" placeholder="Nome ...">
                  </div>
                </div>
                <div class="row" style="justify-content: space-between;margin: 5px;">
                  <div class="form-group col-md-6">
                    <label style="margin: 0px !important;">Senha<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                    <input type="password" id="selSenha" name="selSenha" class="form-control" placeholder="Senha ...">
                  </div>
                  <div class="form-group col-md-6">
                    <label style="margin: 0px !important;">Repetir Senha<i class="fas fa-asterisk" style="font-size: 7px;color: red;vertical-align: text-top;"></i></label><br>
                    <input type="password" id="selConf" name="selConf" class="form-control" placeholder="Senha ...">
                  </div>
                </div>

                <div class="custom-control custom-checkbox col-md-5" style="margin: auto;margin-top: 15px;">
                  <input type="checkbox" name="terms" class="custom-control-input" id="terms" aria-describedby="terms-error" aria-invalid="false">
                  <label class="custom-control-label" for="terms">Eu aceito os <a href="<?= base_url() ?>/resources/terms/TermosUsuario.pdf" target="blank">Termos de Serviço</a>.</label>
                </div>
              </div>

              <div class="card-footer">
                <button type="button" id="UserAdd" onclick="bntUserAdd();" class="btn btn-outline-primary btn-sm ml-2 float-right"><i class="fas fa-save"> Criar</i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1><b>Eh Festa</b></ah1>
      </div>
      <div class="card-body">
        <a class="btn btn-block btn-info" data-toggle="modal" data-target="#modalUsuario">
          <i class="fas fa-user-plus mr-2"></i> Criar conta
        </a>
        <br>
        <p class="login-box-msg">Iniciar sessão</p>

        <form action="<?php echo base_url('LoginController/signin') ?>" method="post">
          <div class="input-group mb-3">
            <input type="email" name='txtLogin' id='txtLogin' class="form-control" placeholder="Usuário">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name='txtPass' id='txtPass' class="form-control" placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <?php $msg = session()->getFlashData('msg') ?>
          <?php if (!empty($msg)) : ?>
            <div class="alert alert-danger">
              <?php echo $msg ?>
            </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Lembrar
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Entrar <i class="fas fa-sign-in-alt"></i></button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Entrar com Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Entrar com Google+
          </a>
          <a href="#" class="btn btn-block bg-orange">
            <i class="fab fa-instagram mr-2"></i> Entrar com Instagram
          </a>
        </div>
        <p class="mb-1">
          <a href="forgot-password.html">Esqueci a senha</a>
        </p>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->



</body>

</html>