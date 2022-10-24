function atualizar(event) {

    event.preventDefault();

    let id = 'perfil';
    let form = $('#form-edit-' + id);
    let url = form.attr("data-id");
    let data = form.serialize();

    if (form.valid()) {

        $(".btn-submit-update").attr("disabled", true);
        //console.log(data);

        $.ajax({
            type: "POST",
            url: urlSistema + "/" + url,
            data: data,
            success: function (data) {
                let json = JSON.parse(data);

                switch (json.status){
                    case 'sucesso':
                        toastr.success(json.alerta);
                        $(".btn-submit-update").attr("disabled", false);
                    break;
                    case 'senha':
                        toastr.warning(json.alerta);
                        $(".btn-submit-update").attr("disabled", false);
                    break;
                    case 'erro':
                        toastr.warning(json.alerta);
                        $(".btn-submit-update").attr("disabled", false);
                    break;
                }
            },
            error: function (data) {
                toastr.error("");
                $(".btn-submit-update").attr("disabled", false);
            }
        });
    } else {
        toastr.warning("Existem campos obrigatórios.");
        $(".btn-submit-update").attr("disabled", false);
    }

}

$('.btn-submit-update').click(atualizar);