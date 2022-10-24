<div class="content">
  <div class="container-fluid">
    <h5><i class="fas fa-list-ul"></i> <?= isset($nomeCliente) ? '<span class=" font-weight-bold"> [' . $nomeCliente . '] </span>' : "" ?> <?= lang('Usuarios.lista_de_usuarios') ?></h5>
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
              <?php if (isset($grupo) && $grupo == 2) { ?> 
                    <a href="<?= base_url() ?>/cliente" class="btn btn-default"> <i class="fas fa-arrow-left"></i> <?= lang('Usuarios.voltar') ?> </a>
              <?php } ?>
                <button type="button" class="btn btn-primary float-right" id="btnModalCriarUsuario" data-toggle="modal" data-target="#modal-xl" ><i class="fas fa-plus"></i> <?= lang('Usuarios.criar') ?></button>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-12 right">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                  <input type="checkbox" class="custom-control-input" id="switchFilter">
                  <label class="custom-control-label" for="switchFilter"> <?= lang('Usuarios.inativo_ativo') ?></label>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-sm text-center <?= isset($usuarios) && count($usuarios) > 0 ? "table-management" : "" ?>">
                <thead>
                  <tr>
                    <th style="width:90px"></th>
                    <th><?= lang('Usuarios.nome') ?></th>
                    <th><?= lang('Usuarios.email') ?></th>
                  </tr>
                </thead>
                <tbody class="">
                  <?php if (isset($usuarios) && count($usuarios) > 0) { ?>
                    <?php foreach ($usuarios as $item) { ?>
                      <tr>
                        <td class="align-middle">
                          <a title="<?= lang('Usuarios.editar') ?>" class="btn btn-outline-primary btn-sm btn-modal" id="<?= $item->id ?>" data-id="usuario">
                            <i class="fas fa-edit"></i>
                          </a>
                        </td>
                        <td class="text-left"><?= $item->nome ?> <?= $item->sobrenome ?></td>
                        <td class="text-left"><?= $item->email ?></td>
                      </tr>
                    <?php } ?>
                  <?php } else { ?>
                    <tr class="text-center">
                      <td colspan="5"><?= lang('Usuarios.nenhum_usuario') ?></td>
                    </tr>
                  <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>