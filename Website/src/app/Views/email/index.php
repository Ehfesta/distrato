<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary card-outline animate__animated animate__fadeInUp">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-list-ul"></i> <?= lang('Email.email_smtp') ?> </h3>
                            </div>
                            <div class="example2_wrapper card-body table-responsive p-0 dataTables_wrapper dt-bootstrap4">

                                <table class="table table-striped table-hover table-sm text-center">
                                    <thead>
                                        <tr role="row">
                                            <th><?= lang('Email.servidor_de_email') ?></th>
                                            <th><?= lang('Email.servidor_smtp') ?></th>
                                            <th><?= lang('Email.usuario') ?></th>
                                            <th><?= lang('Email.porta') ?></th>
                                            <th><?= lang('Email.ssl') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($smtp) && count($smtp) > 0) { ?>
                                            <?php foreach ($smtp as $mail) { ?>
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <button title="<?= lang('Email.servidor_de_email') ?>" type="button" class="btn btn-outline-primary btn-sm btn-modal" id="<?= $mail->id ?>" data-id="servidoremail">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                    <td><?= $mail->servidor ?></td>
                                                    <td><?= $mail->usuario ?></td>
                                                    <td><?= $mail->porta ?></td>
                                                    <td><?= $mail->ssl == 's' ? "<i class='far fa-check-circle'>" : " - " ?> </i></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card card-primary card-outline animate__animated animate__fadeInRight">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-paper-plane"></i> <?= lang('Email.enviar_email') ?></h3>
                    </div>
                    <div class="card-body">
                        <="form-servidoremailteste" data-id="servidoremail/envioemailteste">
                            <input class="hashCode" type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="row">
                                <div class="input-group mb-3">
                                    <input class="form-control" type="email" id="input-email-destinatario" name="txtEmail" placeholder="<?= lang('Email.exemplo_email_responsavel') ?>" required>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-dark" id="btn-send-email-test"><i class="fas fa-paper-plane"></i></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- MODAL -->
        <div class="modal fade" id="modal-servidoremail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="form-servidoremail" class="form-cadastrar" data-id="servidoremail/salvar">
                        <input class="hashCode" type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="far fa-envelope"></i> <?= lang('Email.gerenciar_servidor_email') ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <h3 class="card-title"> <?= lang('Email.editar_servidor') ?></h3>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p>(*) <?= lang('Email.campos_obrigatorios') ?>.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">

                                    <input type="hidden" name="txtID" id="input-id-servidor-email">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label for="input-server"> <?= lang('Email.endereco_smtp') ?>: *</label>

                                                <input class="form-control" type="text" name="txtServidor" id="input-server" placeholder="<?= lang('Email.smtp_exemplo') ?>" required>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="input-port"> <?= lang('Email.porta') ?>: *</label>
                                                <input class="form-control" type="number" name="txtPorta" id="input-port" placeholder="587" required>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group clearfix mt-5">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" checked="" id="input-ssl" name="checkSSL">
                                                        <label for="input-ssl">
                                                            <?= lang('Email.ssl') ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="input-user-smtp"> <?= lang('Email.usuario') ?>: *</label>
                                                <input class="form-control" type="text" name="txtUsuario" id="input-user-smtp" placeholder="<?= lang('Email.usuario') ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="input-pass-smtp"> <?= lang('Email.senha') ?>: </label>
                                                <input class="form-control" type="password" name="txtSenha" id="input-pass-smtp" placeholder="*****">
                                                <span><small><?= lang('Email.mantenha_senha') ?>.</small></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-cancel"> <?= lang('Email.fechar') ?> </button>
                            <button type="submit" class="btn btn-primary btn-submit-save"> <?= lang('Email.atualizar') ?> </i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>