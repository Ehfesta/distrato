<!-- Modal -->
<div class="modal fade" id="modal-cttEmail" style="display: none;" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <form id="form-email" data-id="email/salvar">
                <input class="hashCode" type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <input type="hidden" id="input-id-email-modal" name="txtID">

                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-envelope"></i> <?= lang('Email.email') ?></h4>
                </div>

                <!-- COMEÇO DO BODY -->
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <p>(*) <?= lang('Email.campos_obrigatorios') ?>.</p>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12 col-md-4  input-group-msg-modal form-group">
                            <label for="input-tipo-email-modal"><?= lang('Email.tipo') ?>: *</label>
                            <select class="form-control" id="input-tipo-email-modal" name="lstTipoContatoEmail" required>
                                <option value="" selected disabled>Selecione</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-4  input-group-msg-modal form-group">
                            <label for="input-email-modal"><?= lang('Email.email') ?>: *</label>
                            <input class="form-control " type="text" id="input-email-modal" name="txtEmail" required>
                        </div>

                        <div class="col-sm-12 col-md-1  input-group-msg-modal form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input btnEmailPadrao" id="checkEmailPadrao">
                                <label class="custom-control-label" for="checkEmailPadrao" name="txtPadrao">Padrão</label>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- FIM DO BODY -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-cancel"><?= lang('Clientes.cancelar') ?></button>
                    <button type="submit" class="btn btn-success btn-submit-update btn-submit-save"> <?= lang('Clientes.salvar') ?> <i class="fas fa-save"></i></button>
                </div>

            </form>
        </div>
    </div>
</div>